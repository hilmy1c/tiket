<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditDatatypeTrainRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('train_routes', function (Blueprint $table) {
            $table->text('full_route')->change();
            $table->text('full_departure_time')->change();
            $table->text('full_arrival_time')->change();
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
