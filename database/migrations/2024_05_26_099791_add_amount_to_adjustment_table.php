<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountToAdjustmentTable extends Migration
{
    public function up()
    {
        Schema::table('adjustments', function (Blueprint $table) {
            $table->string('total_amount')->nullable();
        });
    }

    public function down()
    {
        Schema::table('adjustments', function (Blueprint $table) {
            $table->string('total_amount')->nullable();

        });
    }
}
