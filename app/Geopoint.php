<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Geopoint extends Model
{
    use SpatialTrait;

    protected $guarded = [];

    protected $spatialFields = [
        'latLon'
    ];

}
