<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreateWebcontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webcontents', function (Blueprint $table) {
            $table->text('bangla_scrolling')->nullable();
            $table->text('bangla_text')->nullable();
            $table->text('bangla_footer')->nullable();
            $table->text('bangla_cardup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webcontents', function (Blueprint $table) {
            $table->dropColumn('bangla_scrolling');
            $table->dropColumn('bangla_text');
            $table->dropColumn('bangla_footer');
            $table->dropColumn('bangla_cardup');
        });
    }
}
