<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationVendor extends Model
{
    protected $fillable = [
        'organisation_id',
        'vendor_id',
        'last_run',
        'auth_data'
    ];

    protected $casts = [
        'last_run' => 'datetime:Y-m-d H:M:S',
        'auth_data' => 'array'
    ];
}
