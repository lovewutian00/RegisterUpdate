<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->increments('Batch_Id');
            $table->string('Name',100)->nullable();
            $table->integer('Year_Intake')->nullable();
            $table->integer('Month_Intake')->nullable();
            $table->integer('Program_Year_Intake')->nullable();
            $table->string('Program_Code',5
                    )->nullable();
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
        Schema::dropIfExists('batches');
    }
}
