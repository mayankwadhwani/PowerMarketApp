<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIrrColumnsTogeopoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('geopoints', function (Blueprint $table) {
          $table->string('irr_simple_percent')->nullable();
          $table->string('irr_discounted_percent')->nullable();
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
          $table->dropColumn(['irr_simple_percent', 'irr_discounted_percent']);
        });
    }
}
