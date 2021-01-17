<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $guarded = [];

    public function geopoints()
    {
        return $this->belongsToMany(Geopoint::class);
    }
}
