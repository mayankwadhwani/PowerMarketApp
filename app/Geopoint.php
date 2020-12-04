<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Geopoint extends Model
{
    use SpatialTrait;

    const COLUMNS = [
        'latLon',
        'area_sqm',
        'numpanels',
        'roofclass',
        'annual_gen_GBP',
        'annual_gen_kWh',
        'breakeven_years',
        'system_cost_GBP',
        'lifetime_gen_GBP',
        'annual_co2_saved_kg',
        'system_capacity_kWp',
        'lifetime_co2_saved_kg',
        'lifecycle_co2_emissions_kg',
        'lifetime_return_on_investment_percent',
        'lats',
        'lons',
        'yearly_co2_saved_kg',
        'monthly_gen_export_value_GBP',
        'monthly_gen_saving_value_GBP'
    ];
    protected $guarded = [];

    protected $spatialFields = [
        'latLon'
    ];
}
