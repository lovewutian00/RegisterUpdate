<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->increments('Eva_Id');
            $table->integer('A1')->nullable();
            $table->integer('A2')->nullable();
            $table->integer('A3')->nullable();
            $table->integer('B1')->nullable();
            $table->integer('B2')->nullable();
            $table->integer('B3')->nullable();
            $table->integer('Total')->nullable();
            $table->string('Spv_Id',10);
            $table->string('Stud_Id',10);
            $table->string('Comment',300)->nullable();
            $table->foreign('Spv_Id')->references('Spv_Id')->on('supervisors');
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
        Schema::dropIfExists('evaluation');
    }
}
