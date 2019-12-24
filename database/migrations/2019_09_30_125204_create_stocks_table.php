<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('species');
            $table->date('st_date');
            $table->bigInteger('ob_m');
            $table->bigInteger('ob_f');
            $table->bigInteger('ob_t');
            $table->bigInteger('re_m')->nullable();
            $table->bigInteger('re_f')->nullable();
            $table->bigInteger('is_m')->nullable();
            $table->bigInteger('is_f')->nullable();
            $table->bigInteger('mt_m')->nullable();
            $table->bigInteger('mt_f')->nullable();
            $table->bigInteger('cb_m');
            $table->bigInteger('cb_f');
            $table->bigInteger('cb_t');
            $table->string('remarks');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
