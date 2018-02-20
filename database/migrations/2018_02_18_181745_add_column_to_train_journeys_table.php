<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToTrainJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('train_journeys', function (Blueprint $table) {
            $table->integer('start_station_id')->unsigned()->nullable();
            $table->integer('end_station_id')->unsigned()->nullable();
            $table->foreign('start_station_id')->references('id')->on('train_stations')->onDelete('set null');
            $table->foreign('end_station_id')->references('id')->on('train_stations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('train_journeys', function (Blueprint $table) {
            //
        });
    }
}
