<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flight_number')->nullable();
            $table->string('train_number')->nullable();
            $table->integer('booking_id')->unsigned()->nullable();
            $table->string('flight_fare_total')->nullable();
            $table->string('train_fare_total')->nullable();
            $table->integer('adult_number');
            $table->integer('child_number')->nullable();
            $table->integer('baby_number')->nullable();
            $table->string('adult_fare');
            $table->string('child_fare');
            $table->string('baby_fare');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('set null');
            $table->foreign('flight_number')->references('flight_number')->on('flights')->onDelete('set null');
            $table->foreign('train_number')->references('train_number')->on('train_journeys')->onDelete('set null');
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
        Schema::dropIfExists('booking_details');
    }
}
