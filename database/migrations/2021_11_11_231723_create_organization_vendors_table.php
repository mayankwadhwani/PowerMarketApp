<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_vendors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organisation_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();
            $table->timestamp('last_run')->nullable();
            $table->json('auth_data');
            $table->tinyInteger('active')->comment('1 = yes, 0 = no');
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
        Schema::dropIfExists('organization_vendors');
    }
}
