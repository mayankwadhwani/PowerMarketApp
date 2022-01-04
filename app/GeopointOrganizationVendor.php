<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeopointOrganizationVendor extends Model
{
    protected $fillable = [
        'geopoint_id',
        'organization_vendor_id',
        'site_id'
    ];

    public function organization_vendor()
    {
        return $this->belongsTo(OrganizationVendor::class);
    }

    public function geopoint()
    {
        return $this->belongsTo(Geopoint::class);
    }
}
