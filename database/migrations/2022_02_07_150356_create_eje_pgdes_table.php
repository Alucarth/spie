<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjePgdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eje_pgdes', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('eje_id');
            $table->foreign('eje_id')->references('id')->on('ejes');

            $table->unsignedInteger('pgdes_structure_id');
            $table->foreign('pgdes_structure_id')->references('id')->on('pgdes_structures');

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
        Schema::dropIfExists('eje_pgdes');
    }
}
