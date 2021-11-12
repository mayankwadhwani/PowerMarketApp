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
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
