<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string("codigo");
            $table->longText("descripcion");
            $table->unsignedInteger('resultado_id');
            $table->foreign('resultado_id')->references('id')->on('resultados');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('tipo_accion_id');
            $table->foreign('tipo_accion_id')->references('id')->on('tipo_acciones');
            $table->unsignedInteger('entidad_id')->nullable();//deberia estar en ambos casos 
            $table->foreign('entidad_id')->references('id')->on('entidades');
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
        Schema::dropIfExists('accions');
    }
}
