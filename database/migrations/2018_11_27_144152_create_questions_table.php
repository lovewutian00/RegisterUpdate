<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('QuestId');
            $table->string('Questions_Id');//Remove primary key
            $table->string('Question',100);
            $table->string('Type',10);
            $table->string('Value1',30)->nullable();
            $table->string('Value2',30)->nullable();
            $table->string('Value3',30)->nullable();
            $table->string('Value4',30)->nullable();
            $table->string('Value5',30)->nullable();
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
        Schema::dropIfExists('questions');
    }
}
