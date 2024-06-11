<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCurrentStatusFromOrderTable extends Migration
{

    public function up()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->dropForeign(['current_status']);
            // Drop the column
            $table->dropColumn('current_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('website_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('current_status')->nullable();
            // Add foreign key constraint back
            $table->foreign('current_status')->references('id')->on('order_statuses')->onDelete('cascade');
        });
    }
}
