<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramacionFinancierasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacion_financieras', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('plan_institucional_id');
            $table->foreign('plan_institucional_id')->references('id')->on('plan_institucional');

            $table->unsignedInteger('tipo_programacion_financieras_id');
            $table->foreign('tipo_programacion_financieras_id')->references('id')->on('tipo_programacion_financieras');

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
        Schema::dropIfExists('programacion_financieras');
    }
}
