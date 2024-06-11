<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table ->id();
            $table -> string('name');
            $table -> string('price')->nullable();
            // $table -> string('product_code')->nullable();
            // $table -> string('sku')->nullable();
            // $table -> string('brand')->nullable();
            $table -> string('stock')->nullable();
            $table -> string('image')->nullable();
            // $table->unsignedBigInteger('category')->nullable();
            $table -> timestamps();
            // $table->foreign('category')->references('id')->on('category_models')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_models');
    }
}





