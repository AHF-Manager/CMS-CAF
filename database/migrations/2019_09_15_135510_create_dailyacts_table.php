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
            $table->bigIncrements('id');
            $table->date('dct_date');
            $table->string('day');
            $table->string('count');
            $table->string('activity');
            $table->string('phase');
            $table->string('sr_no');
            $table->string('iaec_no');
            $table->string('details')->nullable();
            $table->string('short_title');
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
