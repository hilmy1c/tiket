<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAirlineIdToAirplanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('airplanes', function (Blueprint $table) {
            $table->integer('airline_id')->unsigned();
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('airplanes', function (Blueprint $table) {
            $table->dropColumn('airline_id');
        });
    }
}
