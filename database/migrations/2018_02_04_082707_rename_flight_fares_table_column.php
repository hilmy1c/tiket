<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameFlightFaresTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flight_fares', function (Blueprint $table) {
            $table->dropColumn('adult_number');
            $table->dropColumn('child_number');
            $table->dropColumn('baby_number');
            $table->string('passenger');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flight_fares', function (Blueprint $table) {
            //
        });
    }
}
