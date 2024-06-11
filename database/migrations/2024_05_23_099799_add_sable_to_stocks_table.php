<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSableToStocksTable extends Migration
{
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('stockable_type')->nullable();
            $table->string('stockable_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('stockable_type')->nullable();
            $table->string('stockable_id')->nullable();
        });
    }
}
