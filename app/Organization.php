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
}
