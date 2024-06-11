<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropVehicleAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('vehicle_assigns', function (Blueprint $table) {
            $table->dropColumn(['vehicleno', 'drivername', 'shift']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_assigns', function (Blueprint $table) {
            $table->string('vehicleno')->nullable();
            $table->string('drivername')->nullable();
            $table->string('shift')->nullable();
        });
    }
}
