<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_result', function (Blueprint $table) {
            $table->string('Stud_Id',10);
            $table->string('Gender',7); 
            $table->string('Cmp_Name',50);
            $table->string('Prog_Code',3); 
            $table->string('Intern_Paid',4); 
            $table->string('Q1',8);
            $table->string('Q2',20); 
            $table->string('Q3',20);
            $table->string('Q4',20);
            $table->string('Q5',20);
            $table->string('Q6',20);
            $table->string('Q7',20);
            $table->string('Q8',20);
            $table->string('Q9',20);
            $table->string('Q10',20);
            $table->string('Q11',20);
            $table->string('Q12',20);
            $table->string('Q13',4);
            $table->string('Q14',28);
            $table->string('Q15',200);
            $table->string('Q16',200);
            $table->string('Q17',200);
            $table->string('Q18',200);
            $table->string('Q19',200);
            $table->string('Q20',200);
            $table->foreign('Stud_Id')->references('Stud_Id')->on('students');
            $table->integer('Survey_Id')->unsigned();
            $table->foreign('Survey_Id')->references('Survey_Id')->on('surveys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_result');
    }
}
