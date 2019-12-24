<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animalinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('animal_id')->unique();

            $table->string('sr_no');
            $table->date('ai_date');
            $table->string('group_id');
            $table->string('group_name');
            $table->string('death_details');
            
            $table->string('treatment_details');
            $table->string('organs_hp');
            $table->string('blood_collection');
            $table->string('total_animals');
            $table->string('total_groups');
            $table->text('remarks');








        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animalinfos');
    }
}
