<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_feedback', function (Blueprint $table) {
            $table->increments('Feedback_Id');
            $table->string('Feedback',1000)->nullable();
            $table->timestamps();
            $table->integer('Visit_Id')->unsigned();
            $table->foreign('Visit_Id')->references('Visit_Id')->on('company_visit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_feedback');
    }
}
