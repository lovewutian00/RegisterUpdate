<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->increments('Preference_Id');
            $table->string('Keyword_1',100)->nullable();
            $table->string('Keyword_2',100)->nullable();
            $table->string('Keyword_3',100)->nullable();
            $table->string('Keyword_4',100)->nullable();
            $table->string('Keyword_5',100)->nullable();
            $table->string('Location_1',100)->nullable();
            $table->string('Location_2',100)->nullable();
            $table->string('Location_3',100)->nullable();
            $table->string('Job_Type_1',100)->nullable();
            $table->string('Job_Type_2',100)->nullable();
            $table->string('Job_Type_3',100)->nullable();
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
        Schema::dropIfExists('preferences');
    }
}
