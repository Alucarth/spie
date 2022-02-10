<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorPlanInstitucionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicador_plan_institucional', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('plan_institucional_id');
            $table->foreign('plan_institucional_id')->references('id')->on('plan_institucional');
            $table->string("descripcion");
            $table->string("formula");
            $table->string("linea_base");
            $table->string("year");
            $table->string("meta");
            $table->string("gestion_meta");
            $table->string("ponderacion_prioridad");
            $table->string("fuente_informacion");

            // $table->integer("year");
            // $table->double("valor");

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
        Schema::dropIfExists('indicador_plan_institucional');
    }
}
