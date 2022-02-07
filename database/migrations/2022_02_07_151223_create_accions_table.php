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
            $table->string("descripcion");
            $table->timestamps();
            $table->unsignedInteger('resultado_id');
            $table->foreign('resultado_id')->references('id')->on('resultados');
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
