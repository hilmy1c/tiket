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
            $table->string('departure_station');
            $table->string('arrival_station');
            $table->string('train_number');
            $table->date('departure_time');
            $table->date('arrival_time');
            $table->integer('train_id');
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
        Schema::dropIfExists('train_journeys');
    }
}
