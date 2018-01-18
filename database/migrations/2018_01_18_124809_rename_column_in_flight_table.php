<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnInFlightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->renameColumn('dest', 'destination');
            $table->renameColumn('depart_time', 'departure_time');
            $table->renameColumn('arrive_time', 'arrival_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->renameColumn('destination', 'dest');
            $table->renameColumn('departure_time', 'depart_time');
            $table->renameColumn('arrival_time', 'arrive_time');
        });
    }
}
