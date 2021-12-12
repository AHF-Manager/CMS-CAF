<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyacts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dct_date');
            $table->string('day');
            $table->string('count');
            $table->string('activity');
            $table->string('phase');
            $table->string('details')->nullable();
            $table->integer('id_project_details')->unsigned();
            $table->foreign('id_project_details')->references('id')->on('projects');

        });
        






        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailyacts');
    }
}
