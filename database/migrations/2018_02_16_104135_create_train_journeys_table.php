<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_journeys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('train_route_id')->unsigned()->nullable();
            $table->date('departure_time');
            $table->date('arrival_time');
            $table->timestamps();
            $table->foreign('train_route_id')->references('id')->on('train_routes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('train_journeys', function (Blueprint $table) {
            //
        });
    }
}
