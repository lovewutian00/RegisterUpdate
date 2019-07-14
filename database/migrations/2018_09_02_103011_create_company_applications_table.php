<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_applications', function (Blueprint $table) {
            $table->string('Stud_Id',10);
            $table->integer('Cmp_Id')->unsigned();
            $table->dateTime('ApplyDT')->nullable();
            $table->string('Title',30)->nullable();
            $table->string('Content',1500)->nullable();
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
        Schema::dropIfExists('company_applications');
    }
}
