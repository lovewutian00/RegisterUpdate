<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('Job_Id');
            $table->string('Title',50)->nullable();
            $table->string('Descript',500)->nullable();
            $table->string('Location',30)->nullable();
            $table->dateTime('PostDT')->nullable();
            $table->string('Qualification')->nullable();
            $table->decimal('MinAllowance',10,2)->nullable();
            $table->decimal('MaxAllowance',10,2)->nullable();
            $table->string('DressCode',50)->nullable();
            $table->string('ProcessTime',20)->nullable();
            $table->string('WorkingDays',100)->nullable();
            $table->string('WorkingHours',100)->nullable();
            $table->boolean('Accomodation')->nullable();
            $table->string('Benefits',100)->nullable();
            $table->integer('Cmp_Id')->unsigned();
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
        Schema::dropIfExists('job_posts');
    }
}
