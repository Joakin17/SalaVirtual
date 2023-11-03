<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamospaceestudiantesTable extends Migration
{
    public function up()
    {
        Schema::create('prestamospaceestudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('mesa');
            $table->unsignedInteger('puesto');
            $table->string('carnet');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('facultad');
            $table->string('carrera');
            $table->string('genero');
            $table->timestamp('hora_entrada')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamospaceestudiantes');
    }
}
