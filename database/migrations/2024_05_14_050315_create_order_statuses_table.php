<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{

    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('order_id')->nullable();
            $table->string('Assign_delivery_man')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
