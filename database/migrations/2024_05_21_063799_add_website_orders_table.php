<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWebsiteOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('delivery_man_id')->nullable();
            $table->unsignedBigInteger('current_status')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('order_source')->nullable()->comment('Website, App');
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('coupon_discount_amount')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->integer('due_amount')->nullable();

            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('delivery_man_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('current_status')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product_models')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->dropForeign(['warehouse_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['delivery_man_id']);
            $table->dropForeign(['current_status']);
            $table->dropForeign(['product_id']);
            $table->dropColumn('warehouse_id');
            $table->dropColumn('customer_id');
            $table->dropColumn('product_id');
            $table->dropColumn('current_status');
            $table->dropColumn('delivery_date');
            $table->dropColumn('date');
            $table->dropColumn('order_source');
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_status');
            $table->dropColumn('coupon_discount_amount');
            $table->dropColumn('paid_amount');
            $table->dropColumn('due_amount');
        });
    }
}
