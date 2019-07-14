<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->increments('Edu_Id');
            $table->string('University',60)->nullable();
            $table->date('Grad_Date')->nullable(); //graduation date
            $table->string('Qualification',30)->nullable();
            $table->string('Uni_Location',50)->nullable(); //country
            $table->string('Field_Of_Study',200)->nullable(); //computer science, economic, etc
            $table->string('Major',100)->nullable();
            $table->string('Grade',50)->nullable(); //grade A, B, pass,cgpa, etc
            $table->decimal('CGPA',7,4)->nullable(); //can be null if grade is not CGPA
            $table->string('Additional_Info',2500)->nullable();
            $table->string('Stud_Id',10);
            $table->foreign('Stud_Id')->references('Stud_Id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
