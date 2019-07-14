<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_infos', function (Blueprint $table) {
            $table->increments('Add_Info_Id');
            $table->decimal('Expected_Salary',8,2)->nullable();
            $table->string('Preferred_Location_one',30)->nullable();
            $table->string('Preferred_Location_two',30)->nullable();
            $table->string('Preferred_Location_three',30)->nullable();
            $table->boolean('Oversea')->default(false); //indicate to work in oversea
            $table->string('Other_Info',2500)->nullable();
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
        Schema::dropIfExists('additional_infos');
    }
}
