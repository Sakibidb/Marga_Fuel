<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDriverStatusToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->string('driver_status')->nullable();
        });
    }

    public function down()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->dropColumn('driver_status');
        });
    }
}
