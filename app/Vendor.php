<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    protected $casts = [
        'auth_data' => 'array'
    ];
}
