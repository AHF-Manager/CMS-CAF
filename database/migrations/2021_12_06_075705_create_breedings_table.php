<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breedings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start');
            $table->string('male_id');
            $table->string('female_id');
            $table->date('seperate');
            $table->date('delivery');
            $table->string('del_male');
            $table->string('del_female');
            $table->string('tot');
            $table->date('weaning');
            $table->string('pup_male');
            $table->string('pup_female');
            $table->string('m_male')->nullable();
            $table->string('m_female')->nullable();
            $table->string('total');
            $table->integer('animal_id')->unsigned();
            $table->foreign('animal_id')->references('id')->on('animals');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breedings');
    }
}
