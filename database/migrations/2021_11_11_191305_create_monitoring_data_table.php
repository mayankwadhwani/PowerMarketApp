<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('geopoint_id')->unsigned();
            $table->bigInteger('organization_vendor_id')->unsigned();
            $table->double('energy_generated_wh', 18, 9)->unsigned();
            $table->timestamp('range_start')->nullable();
            $table->timestamp('range_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cluster_user');
    }
}
