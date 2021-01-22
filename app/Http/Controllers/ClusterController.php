<?php

namespace App\Http\Controllers;

use App\Cluster;

use App\Http\Resources\ClusterResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClusterController extends Controller
{
    public function index(Request $request)
    {
        return ClusterResource::collection($request->user()->clusters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'geopoints' => 'required|json',
        ]);
        $geopoints = json_decode($request->geopoints);
        $user = $request->user();
        if (Cluster::where('user_id', $user->id)->where('name', $request->name)->exists()) {
            return response()->json([
                'message' => 'The cluster with this name already exists'
            ], 422);
        }
        if ($user->isMember()) {
            return abort(404);
        }
        $cluster = Cluster::create([
            'name' => $request->name,
            'user_id' => $user->id
        ]);
        $cluster->geopoints()->attach($geopoints);
        $cluster->setLatLon();
        return response()->json([
            'message' => 'The cluster has been successfully created',
            'cluster' => new ClusterResource($cluster)
        ], 200);
    }

    public function addGeopoint(Request $request)
    {
        $request->validate([
            'geopoint_id' => 'required|integer',
            'new_name' => 'required_without:cluster_id',
            'cluster_id' => 'required_without:new_name|integer|exists:clusters,id'
        ]);
        $user = $request->user();
        $organization = $user->organization;
        if ($organization == null && !$user->isAdmin()) {
            return abort(404);
        }
        if ($user->isOrgAdmin()) {
            //geopoint possession validation
            $geopoint_ids = DB::table('organizations')->join('account_organization', 'organizations.id', '=', 'account_organization.organization_id')
                ->join('regions', 'account_organization.account_id', '=', 'regions.account_id')
                ->join('geopoints', 'regions.id', '=', 'geopoints.region_id')
                ->where('organizations.id', $organization->id)->select('geopoints.id')->get();
            if (!$geopoint_ids->contains('id', $request->geopoint_id)) {
                return response()->json(['message' => 'Geopoint not found'], 422);
            }
            //cluster possession validation
            if ($request->filled('cluster_id')) {
                if (!$user->clusters->contains('id', $request->cluster_id)) {
                    return response()->json(['message' => 'Cluster not found'], 422);
                }
                $cluster = Cluster::findOrFail($request->cluster_id);
            } else {
                if (Cluster::where('user_id', $user->id)->where('name', $request->new_name)->exists()) {
                    return response()->json([
                        'message' => 'The cluster with this name already exists'
                    ], 422);
                }
                $cluster = Cluster::create([
                    'name' => $request->new_name,
                    'user_id' => $user->id
                ]);
            }
            $cluster->addGeopoint($request->geopoint_id);
            $cluster->setLatLon();
            return response()->json(['message' => 'Geopoint has been successfully added'], 200);
        } else if ($user->isOrgMember()) {
            //not available for org members for now
            return abort(404);
        }
    }
}
