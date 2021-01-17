<?php

namespace App\Http\Controllers;

use App\Cluster;

use Illuminate\Http\Request;

class ClusterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'geopoints' => 'required|json',
        ]);
        $geopoints = json_decode($request->geopoints);
        $user = $request->user();
        if ($user->isMember()) {
            return abort(404);
        }
        $cluster = Cluster::create([
            'name' => $request->name,
            'user_id' => $user->id
        ]);
        $cluster->geopoints()->attach($geopoints);
        return response()->json(['message' => 'The cluster has been successfully created'], 200);
    }
}
