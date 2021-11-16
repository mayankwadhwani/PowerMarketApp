<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded = [];

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }

    public function vendors()
    {
        return $this->hasMany(OrganizationVendor::class, 'organisation_id');
    }
}
