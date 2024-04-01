<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('recinto_id');
            $table->unsignedBigInteger('actividad_id');
            $table->timestamps();

            $table->foreign('especie_id')->references('id')->on('especies');
            $table->foreign('recinto_id')->references('id')->on('recintos');
            $table->foreign('actividad_id')->references('id')->on('actividades');
        });
    }

    public function down()
    {
        Schema::dropIfExists('animals');
    }
}

