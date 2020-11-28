<?php

namespace App\Http\Controllers;

use App\Region;
use App\Geopoint;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function wrapPoint($point)
    {
        return "ST_GeomFromText('POINT(" . $point['centre_lat'] . " " . $point['centre_lon'] . ")', 4326)";
    }
    public function create(Request $request)
    {
        $request->validate([
            'geodata' => 'required|json',
            'region_name' => 'required'
        ]);
        $region = Region::create([
            'name' => $request->region_name
        ]);
        $values = [];
        $json_data =  json_decode($request->geodata, true)['regions'];
        foreach ($json_data as $point) {
            $value = [];
            foreach(Geopoint::COLUMNS as $field){
                if($field == 'latLon'){
                    $value[] = $this->wrapPoint($point);
                }
                else{ 
                    $value[] = '"'.$point[$field].'"';
                }
            }
            $value[] = '"'.$region->id.'"';
            $values[] = "(".implode(",", $value).")";
        };
        DB::insert('insert into geopoints ('.implode(",",Geopoint::COLUMNS).',region_id) values '.implode(",", $values));
        return view('pages.admin_dashboard', [ 'success' => true ]);
    }
}
