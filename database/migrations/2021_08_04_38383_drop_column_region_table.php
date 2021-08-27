<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->dropColumn('captiveuse');
            $table->dropColumn('exporttariff');
            $table->dropColumn('residentialtariff');
            $table->dropColumn('nonresidentialtariff');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('captiveuse');
            $table->dropColumn('exporttariff');
            $table->dropColumn('residentialtariff');
            $table->dropColumn('nonresidentialtariff');
        });
    }
}
