<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('Leave_Id');
            $table->date('Leave_Date')->nullable();
            $table->string('Leave_Day',30)->nullable();
            $table->string('Leave_Reason',300)->nullable();
            $table->string('Cmp_Approve',3);
            $table->string('Spv_Approve',3);
            $table->integer('Report_Id')->unsigned();
            $table->foreign('Report_Id')->references('Report_Id')->on('reports');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
