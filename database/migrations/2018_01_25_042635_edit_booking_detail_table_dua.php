<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditBookingDetailTableDua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_details', function (Blueprint $table) {
        	$table->integer('train_fare_id')->unsigned();
        	$table->integer('flight_fare_id')->unsigned()->change();
        	$table->foreign('flight_fare_id')->references('id')->on('flight_fares')->onDelete('cascade');
        	$table->foreign('train_fare_id')->references('id')->on('train_fares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
