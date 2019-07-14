<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_student', function (Blueprint $table) {
            $table->string('Stud_Id',10);
            $table->integer('Cmp_Id')->unsigned();
            $table->string('PersonInCharged',30)->nullable();
            $table->string('PicPosition',50)->nullable();
            $table->string('Status',10)->nullable();
            $table->string('Descript',500)->nullable();
            $table->decimal('Allowance',10,2)->nullable();
            $table->string('DressCode',50)->nullable();
            $table->string('WorkingDays',100)->nullable();
            $table->string('WorkingHours',100)->nullable();
            $table->boolean('Accomodation')->nullable();
            $table->string('Benefits',100)->nullable(); 
            $keys = array('Stud_Id','Cmp_Id');
            $table->primary($keys);
            $table->foreign('Stud_Id')->references('Stud_Id')->on('students');
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
        Schema::dropIfExists('company_student');
    }
}
