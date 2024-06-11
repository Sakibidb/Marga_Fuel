<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrentStatusToOrderTable extends Migration
{
    public function up()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->string('current_status')->nullable();
        });
    }

    public function down()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->dropColumn('current_status');
        });
    }
}
