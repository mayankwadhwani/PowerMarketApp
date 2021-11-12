<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeopointOrganizationVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geopoint_organization_vendor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('geopoint_id')->unsigned();
            $table->bigInteger('organization_vendor_id')->unsigned();
            $table->string('site_id');
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
        Schema::dropIfExists('geopoint_organization_vendor');
    }
}
