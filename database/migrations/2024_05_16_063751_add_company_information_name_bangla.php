<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyInformationNameBangla extends Migration
{

    public function up()
    {
        Schema::table('company_information', function (Blueprint $table) {
            $table->text('bangla_company_name')->nullable();

        });
    }


    public function down()
    {
        Schema::table('company_information', function (Blueprint $table) {
            $table->dropColumn('bangla_company_name');
        });
    }
}
