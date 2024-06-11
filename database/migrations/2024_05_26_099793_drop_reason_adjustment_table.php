<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropReasonAdjustmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adjustments', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['adjusted_by']);

            // Then drop the column
            $table->dropColumn('product_id');
            $table->dropColumn('adjusted_by');
            $table->dropColumn('reason');

        });
    }


    public function down()
    {
        Schema::table('adjustments', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('product_models')->onDelete('cascade');
            $table->foreignId('adjusted_by')->constrained('users')->onDelete('cascade');
            $table->string('reason');
        });
    }
}
