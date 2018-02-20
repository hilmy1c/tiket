<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToTrainFaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('train_fares', function (Blueprint $table) {
            $table->integer('train_journey_id')->unsigned()->nullable();
            $table->string('passenger');
            $table->foreign('train_journey_id')->references('id')->on('train_journeys')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('train_fares', function (Blueprint $table) {
            //
        });
    }
}
