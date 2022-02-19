<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGeopointOrganizationVendorsAddAdditionalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('geopoint_organization_vendors', function (Blueprint $table) {
            $table->json('additional_mapping_data')->nullable()->after('site_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geopoint_organization_vendors', function (Blueprint $table) {
            $table->dropColumn('additional_mapping_data');
        });
    }
}
