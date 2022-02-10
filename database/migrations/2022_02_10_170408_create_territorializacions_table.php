<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerritorializacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territorializaciones', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('plan_institucional_id');
            $table->foreign('plan_institucional_id')->references('id')->on('plan_institucional');

            $table->string("codigo_departamento");
            $table->string("codigo_region");
            $table->string("codigo_municipio");
            $table->string("codigo_poblacion");
            $table->string("distrito");


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
        Schema::dropIfExists('territorializaciones');
    }
}
