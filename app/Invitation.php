<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = [];

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
