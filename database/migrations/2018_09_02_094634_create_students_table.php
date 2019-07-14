<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('Stud_Id',10)->primary();
            $table->string('IcNo',14);
            $table->string('FirstName',20)->nullable();
            $table->string('LastName',20)->nullable();
            $table->date('DOB')->nullable();
            $table->string('Race',20)->nullable();
            $table->string('Email',100)->nullable();
            $table->string('ContactNo',15)->nullable();
            $table->string('Address_1',100)->nullable();
            $table->string('Address_2',100)->nullable();
            $table->string('City',100)->nullable();
            $table->string('Postcode',10)->nullable();
            $table->string('State',100)->nullable();
            $table->string('Country',100)->nullable();
            $table->string('Password',150);
            $table->integer('Group')->nullable();
            $table->decimal('CGPA',7,4)->nullable();
            $table->string('FYPTitle',30)->nullable();
            $table->string('FYPDesc',100)->nullable();
            $table->string('Spv_Eva',100)->nullable();
            $table->string('Cmp_Eva',100)->nullable();
            $table->string('Gender',15)->nullable();
            $table->string('Avatar')->default('default.jpg');
            $table->rememberToken();
            $table->integer('Batch_Id')->unsigned()->nullable();
            $table->foreign('Batch_Id')->references('Batch_Id')->on('batches');
            $table->string('Program_Code',5);
            $table->foreign('Program_Code')->references('Program_Code')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
