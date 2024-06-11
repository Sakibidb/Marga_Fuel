<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('totalAmount')->nullable();
            $table->string('quantity')->nullable();
            $table->string('productName')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('paymentMethod')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_orders');
    }
}
