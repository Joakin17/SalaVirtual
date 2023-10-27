<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasalaspaceTable extends Migration
{
    public function up()
    {
        Schema::create('estadisticasalaspace', function (Blueprint $table) {
            $table->id();
            $table->integer('mesa');
            $table->integer('puesto');
            $table->string('nombre');
            $table->string('carnet');
            $table->string('facultad');
            $table->string('carrera');
            $table->string('genero');


            $table->timestamps(); 
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('estadisticasalaspace');
    }
}
