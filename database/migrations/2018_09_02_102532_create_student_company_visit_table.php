<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCompanyVisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_visit', function (Blueprint $table) {
            $table->increments('Visit_Id');
            $table->string('Spv_Id',10)->nullable();
            $table->integer('Cmp_Id')->unsigned();
            $table->string('Title',30)->nullable();
            $table->string('Desc',500)->nullable();
            $table->dateTime('VisitDT')->nullable();
            $table->foreign('Spv_Id')->references('Spv_Id')->on('supervisors');
            $table->foreign('Cmp_Id')->references('Cmp_Id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_visit');
    }
}
