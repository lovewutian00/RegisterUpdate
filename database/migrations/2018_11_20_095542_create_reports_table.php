 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('Report_Id');
            $table->string('Trainee_Name',30)->nullable();
            $table->string('Activity_1',1000)->nullable();
            $table->string('Activity_2',1000)->nullable();
            $table->string('Activity_3',1000)->nullable();
            $table->string('Activity_4',1000)->nullable();           
            $table->string('Additional_Info',1500)->nullable();
            $table->string('Sign',2)->nullable();
            $table->string('Spv_Status',30)->nullable();
            $table->string('Cmp_Status',30)->nullable();
            $table->string('Status',30)->nullable();
            $table->timestamps();
            $table->string('Stud_Id',10);
            $table->integer('Sch_Id')->unsigned();
            $table->foreign('Sch_Id')->references('Sch_Id')->on('schedules');
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
        Schema::dropIfExists('reports');
    }
}
