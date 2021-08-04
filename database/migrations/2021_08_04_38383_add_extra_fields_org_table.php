<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('captiveuse')->nullable();
            $table->string('exporttariff')->nullable();
            $table->string('residentialtariff')->nullable();
            $table->string('nonresidentialtariff')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('captiveuse');
            $table->dropColumn('exporttariff');
            $table->dropColumn('residentialtariff');
            $table->dropColumn('nonresidentialtariff');
        });
    }
}
