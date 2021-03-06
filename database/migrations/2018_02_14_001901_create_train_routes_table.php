<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('train_id')->unsigned()->nullable();
            $table->integer('start_route')->unsigned()->nullable();
            $table->integer('end_route')->unsigned()->nullable();
            $table->date('departure_time');
            $table->date('arrival_time');
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
        Schema::create('train_routes', function (Blueprint $table) {
            //
        });
    }
}
