<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClusterGeopointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cluster_geopoint', function (Blueprint $table) {
            $table->foreignId('cluster_id');
            $table->foreignId('geopoint_id');
            $table->primary(['cluster_id', 'geopoint_id']);
            $table->foreign('cluster_id')->references('id')->on('clusters')->onDelete('cascade');
            $table->foreign('geopoint_id')->references('id')->on('geopoints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cluster_geopoint');
    }
}
