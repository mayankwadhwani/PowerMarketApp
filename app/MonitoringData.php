<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringData extends Model
{
    protected $fillable = [
        'geopoint_id',
        'organisation_vendor_id',
        'energy_generated_wh',
        'range_start',
        'range_end'
    ];

    public function geopoint()
    {
        return $this->belongsTo(Geopoint::class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organization::class);
    }
}
