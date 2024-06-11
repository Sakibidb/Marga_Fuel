<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockSummariesTable extends Migration
{
    public function up()
    {
        Schema::create('stock_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('vehicle_assign_id')->nullable();
            $table->decimal('stock_in_qty', 16, 6)->nullable()->default(0);
            $table->decimal('stock_out_qty', 16, 6)->nullable()->default(0);
            $table->decimal('balance_qty', 16, 6)->virtualAs('stock_in_qty - stock_out_qty');
            $table->decimal('stock_in_value', 16, 6)->nullable()->default(0);
            $table->decimal('stock_out_value', 16, 6)->nullable()->default(0);
            $table->decimal('total_stock_value', 16, 6)->virtualAs('stock_in_value - stock_out_value');
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('vehicle_assign_id')->references('id')->on('vehicle_assigns')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product_models')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_summaries');
    }
}
