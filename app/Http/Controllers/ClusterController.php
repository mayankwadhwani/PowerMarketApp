<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\User;
use App\Http\Resources\ClusterResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Notifications\NewSharedProject;

class ClusterController extends Controller
{
    public function index(Request $request)
    {
        // return ClusterResource::collection($request->user()->clusters);
        $my_clusters = DB::table('clusters')->where('user_id', $request->user()->id)->get();
        return ClusterResource::collection($my_clusters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'geopoints' => 'required|json',
        ]);
        $geopoints = json_decode($request->geopoints);

        if($request->pro_params){
          $pro_params = json_decode($request->pro_params);
        };

        $user = $request->user();
        if (Cluster::where('user_id', $user->id)->where('name', $request->name)->exists()) {
            return response()->json([
                'message' => 'The project with this name already exists'
            ], 422);
        }
        if ($user->isMember()) {
            return abort(404);
        }
        $cluster = Cluster::create([
            'name' => $request->name,
            'user_id' => $user->id
        ]);

        //$cluster->geopoints()->attach($geopoints);
        //create data array for each geopoint and insert to db using a single query:
        $geopoint_data = [];
        foreach($geopoints as $geopoint){
            // the hardcoded values account for when user create cluster directly from the non-pro dashboard
            // (meaning no value in each input field)
            array_push($geopoint_data, [
                'cluster_id'=>$cluster->id,
                'geopoint_id' => $geopoint,
                'captive_use'=>$pro_params->captive_use ?? 0.8,
                'export_tariff' => $pro_params->export_tariff ?? 0.055,
                'domestic_tariff' => $pro_params->domestic_tariff ?? 0.146,
                'commercial_tariff' => $pro_params->commercial_tariff ?? 0.12,
                'system_cost' => $pro_params->system_cost ?? 6000,
                'system_size' => $pro_params->system_size ?? 5
            ]);
        };

        DB::table('cluster_geopoint')->insert($geopoint_data);

        $cluster->setLatLon();
        return response()->json([
            'message' => 'The project has been successfully created',
            'cluster' => new ClusterResource($cluster),
            'cluster_link' => URL::to('/projects/'.$cluster->name)
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

            //temporary updates before the cluster-user relationship in the database is updated
            $my_clusters = DB::table('clusters')
                ->where('user_id', $user->id)
                ->get();

            //cluster possession validation
            if ($request->filled('cluster_id')) {
                // if (!$user->clusters->contains('id', $request->cluster_id)) {
                if (!$my_clusters->contains('id', $request->cluster_id)) {
                    return response()->json(['message' => 'Project not found'], 422);
                }
                $cluster = Cluster::findOrFail($request->cluster_id);
            } else {
                if (Cluster::where('user_id', $user->id)->where('name', $request->new_name)->exists()) {
                    return response()->json([
                        'message' => 'The project with this name already exists'
                    ], 422);
                }
                $cluster = Cluster::create([
                    'name' => $request->new_name,
                    'user_id' => $user->id
                ]);
            }

            // $cluster->addGeopoint($request->geopoint_id);
            //insert geopoint with all the pro params:
            $pro_params = json_decode($request->pro_params);

            $geopoint_params = [
                'captive_use'=>$pro_params->captive_use ?? 0.8,
                'export_tariff' => $pro_params->export_tariff ?? 0.055,
                'domestic_tariff' => $pro_params->domestic_tariff ?? 0.146,
                'commercial_tariff' => $pro_params->commercial_tariff ?? 0.12,
                'system_cost' => $pro_params->system_cost ?? 6000,
                'system_size' => $pro_params->system_size ?? 5
            ];
            $cluster->addGeopoint($request->geopoint_id, $geopoint_params);

            $cluster->setLatLon();
            return response()->json([
                'message' => 'Geopoint has been successfully added',
                'cluster_link' => URL::to('/projects/'.$cluster->name)
            ], 200);
        } else if ($user->isOrgMember()) {
            //not available for org members for now
            return abort(404);
        }
    }

    public function removeGeopoint(Request $request)
    {
        $request->validate([
            'geopoint_id' => 'required|integer',
            'cluster_name' => 'required'
        ]);
        $user = $request->user();
        $cluster = Cluster::where([
            ['user_id', $user->id],
            ['name', $request->cluster_name]
        ])->first();
        if ($cluster == null) {
            return response()->json([
                'message' => 'The project is not found'
            ], 404);
        }
        $cluster->geopoints()->detach($request->geopoint_id);
        return response()->json([
            'message' => 'The geopoint has been successfully removed'
        ], 200);
    }

    //adding each user_id in the array contained in the request to the cluster_user pivot table for a cluster
    public function shareCluster(Request $request)
    {
        //$request object should contain: 1. cluster_id of selected cluster; 2. an array of the user('s id) selected
        $request->validate([
            'cluster_id' => 'required',
            'co_owners' => 'required',
        ]);

        $cluster = Cluster::findOrFail($request->cluster_id);
        $cluster->users()->syncWithoutDetaching($request->co_owners); //add the co-owner ids to this cluster in the pivot table

        $co_owners = User::findOrFail($request->co_owners); // the user to notify (single user for now)
        $co_owners->notify(new NewSharedProject(Auth::user(), $cluster));

        return response()->json([
            'message' => 'Project is successfully shared.' //may add co owner names in the future
        ], 200);

    }

    public function delete(Cluster $cluster){
        $cluster->delete();
        return response()->json([
            'message' => 'Project is successfully deleted'
        ], 200);
    }
}
