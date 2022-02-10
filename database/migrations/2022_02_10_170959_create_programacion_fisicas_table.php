<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramacionFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacion_fisicas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('indicador_plan_institucional_id');
            $table->foreign('indicador_plan_institucional_id')->references('id')->on('indicador_plan_institucional');
            $table->integer("year");
            $table->double("valor");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programacion_fisicas');
    }
}
