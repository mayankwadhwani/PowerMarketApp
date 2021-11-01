<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGeopointsAddSiteCodeSiteName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('geopoints', function (Blueprint $table) {
            $table->string('site_name')->nullable()->after('irr_discounted_percent');
            $table->string('site_code')->nullable()->after('site_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geopoints', function (Blueprint $table) {
            $table->dropColumn(['site_name', 'site_code']);
        });
    }
}
