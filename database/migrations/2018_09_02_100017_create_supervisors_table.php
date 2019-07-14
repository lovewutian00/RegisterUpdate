<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->string('Spv_Id',10)->primary();
            $table->string('Spv_Name',40)->nullable();
            $table->string('Password',150);
            $table->string('Email',30)->nullable();
            $table->string('ContactNo',15)->nullable();
            $table->string('Gender',15)->nullable();
            $table->string('Avatar')->default('default.jpg');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisors');
    }
}
