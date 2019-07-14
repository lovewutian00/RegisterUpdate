<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_evaluations', function (Blueprint $table) {
            $table->increments('Eva_Id');
            $table->integer('Q1'); //graduation date
            $table->integer('Q2');
            $table->integer('Q3'); //country
            $table->integer('Q4'); //computer science, economic, etc
            $table->integer('Q5');
            $table->integer('Q6'); //grade A, B, pass,cgpa, etc
            $table->integer('Q7'); //can be null if grade is not CGPA
            $table->integer('Q8');
            $table->integer('Q9');
            $table->integer('Q10');
            $table->integer('WithPermission');
            $table->integer('WithoutPermission');
            $table->string('Grade',2);
            $table->string('Comment',500)->nullable();
            $table->string('ProgOfTraining',200);
            $table->string('SupervisorName',50);
            $table->string('Date',20);
            $table->string('Designation',20);
            $table->string('Stud_Id',10);
            $table->integer('Cmp_Id')->unsigned();            
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
        Schema::dropIfExists('company_evaluations');
    }
}
