<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
