<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('opening_balance')->nullable();
            $table->string('current_balance')->nullable();
            // $table->unsignedBigInteger('account_id')->nullable();
            // $table->unsignedBigInteger('company_id')->nullable();
            $table->string('previous_due')->nullable();
            $table->timestamps();

            // Adding foreign key constraints
            // $table->foreign('account_id')->references('id')->on('accounts')->onDelete('set null');
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
