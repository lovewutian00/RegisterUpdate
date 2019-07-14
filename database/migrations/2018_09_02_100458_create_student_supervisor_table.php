<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_supervisor', function (Blueprint $table) {
            $table->string('Stud_Id',10);
            $table->string('Spv_Id',10);
            $keys = array('Stud_Id','Spv_Id');
            $table->primary($keys);
            $table->foreign('Stud_Id')->references('Stud_Id')->on('students');
            $table->foreign('Spv_Id')->references('Spv_Id')->on('supervisors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_supervisor');
    }
}
