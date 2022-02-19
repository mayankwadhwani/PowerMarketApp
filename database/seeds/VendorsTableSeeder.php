<?php

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            'id' => '1',
            'name' => 'SolarEdge',
            'type' => 'API',
            'auth_data' => '[{"name":"api_key","label":"API key"}]',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('vendors')->insert([
            'id' => '2',
            'name' => 'ShineMonitor',
            'type' => 'API',
            'auth_data' => '[{"name":"username","label":"Username"},{"name":"password","label":"Password"},{"name":"company_key","label":"Company key"}]',
            'geopoint_additional_mapping_data' => '[{"name":"pn","label":"Datalogger PN number "},{"name":"sn","label":"Device serial number"},{"name":"devcode","label":"Device coding"}]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
