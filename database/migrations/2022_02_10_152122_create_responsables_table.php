<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('plan_institucional_id');
            $table->foreign('plan_institucional_id')->references('id')->on('plan_institucional');

            $table->unsignedInteger('entidad_id');
            $table->foreign('entidad_id')->references('id')->on('entidades');

            $table->unsignedInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');


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
        Schema::dropIfExists('responsables');
    }
}
