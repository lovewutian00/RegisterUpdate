<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('Cmp_Id');
            $table->string('Cmp_Name',30)->nullable();
            $table->string('Email',30)->nullable();
            $table->string('ContactNo',15)->nullable();
            $table->string('Password',150);
            $table->string('Address',100)->nullable();
            $table->string('Town',20)->nullable();
            $table->string('State',15)->nullable();
            $table->string('Country',20)->nullable();
            $table->string('PICName',30)->nullable();
            $table->string('PICPosition',20)->nullable();
            $table->string('Gender',15)->nullable();
            $table->string('Avatar')->default('default.jpg');
            $table->string('Remark',150)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
