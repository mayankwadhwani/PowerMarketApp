<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationVendor extends Model
{
    protected $fillable = [
        'organisation_id',
        'vendor_id',
        'last_run',
        'auth_data',
        'active'
    ];

    protected $casts = [
        'last_run' => 'datetime:Y-m-d H:M:S',
        'auth_data' => 'array'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organisation_id', 'id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function geopoint_organization_vendors()
    {
        return $this->hasMany(GeopointOrganizationVendor::class);
    }
}
