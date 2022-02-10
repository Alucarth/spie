<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanInstitucionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_institucional', function (Blueprint $table) {
            $table->increments('id');
            $table->string("codigo");
            $table->string("descripcion_resultado");
            $table->string("descripcion_accion");
            $table->double("presupuesto_total");

            $table->unsignedInteger('formulario_id');
            $table->foreign('formulario_id')->references('id')->on('formularios');

            $table->unsignedInteger('accion_id');
            $table->foreign('accion_id')->references('id')->on('acciones');

            $table->unsignedInteger('tipo_plan_institucional_id');
            $table->foreign('tipo_plan_institucional_id')->references('id')->on('tipo_plan_institucional');

            $table->unsignedInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectores');

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
        Schema::dropIfExists('plan_institucionals');
    }
}
