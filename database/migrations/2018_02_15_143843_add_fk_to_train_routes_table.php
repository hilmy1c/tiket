<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTrainRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('train_routes', function (Blueprint $table) {
            $table->foreign('train_id')->references('id')->on('trains')->onDelete('set null');
            $table->foreign('start_route')->references('id')->on('train_stations')->onDelete('set null');
            $table->foreign('end_route')->references('id')->on('train_stations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('train_routes', function (Blueprint $table) {
            //
        });
    }
}
