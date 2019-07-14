<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('Exp_Id');
            $table->string('Position_Title',30)->nullable();
            $table->string('Company_Name',30)->nullable();
            $table->date('Joined_Frm')->nullable(); 
            $table->date('Joined_To')->nullable();
            $table->string('Country',20)->nullable();
            $table->string('Industry',35)->nullable(); 
            $table->string('Position_Lvl')->nullable(); //manager,senior executive, etc
            $table->string('Salary_Range',35)->nullable(); 
            $table->string('Description',3000)->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
