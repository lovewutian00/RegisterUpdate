<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_activations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cmp_Id')->unsigned();
            $table->string('token',25)->nullable();
            $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('Cmp_Id')->references('Cmp_Id')->on('companies')->onDelete('cascade');
        });
        Schema::table('companies', function (Blueprint $table){
            $table->boolean('is_activated')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_activations');
    }
}
