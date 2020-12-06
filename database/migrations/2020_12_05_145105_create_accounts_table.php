<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // the lat Lon field is created as a geometry data in table, in order to query for 
        // STContains, to find all the points within the polygon, which is super fast, if used
        // spatial indeces in sql
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->point('latLon');
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
        Schema::dropIfExists('accounts');
    }
}
