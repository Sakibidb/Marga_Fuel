<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_assign_id')->nullable();

            $table->foreign('vehicle_assign_id')->references('id')->on('vehicle_assigns')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->dropForeign(['vehicle_assign_id']);

            $table->dropColumn('vehicle_assign_id');
        });
    }
}
