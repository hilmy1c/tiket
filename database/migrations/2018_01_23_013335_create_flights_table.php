<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flight_number');
            $table->integer('from_airport_id')->unsigned();
            $table->integer('destination_airport_id')->unsigned();
            $table->date('departure_time');
            $table->date('arrival_time');
            $table->integer('airplane_id')->unsigned();
            $table->timestamps();
            $table->foreign('from_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('destination_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('airplane_id')->references('id')->on('airplanes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
