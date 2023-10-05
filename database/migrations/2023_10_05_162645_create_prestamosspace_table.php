<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosspaceTable extends Migration
{
    public function up()
    {
        Schema::create('prestamosspace', function (Blueprint $table) {
            $table->id();
            $table->integer('mesa'); // Cambiar el nombre de columna a 'mesa'
            $table->integer('puesto');
            $table->string('nombre');
            $table->string('nit'); // Cambiar el nombre de columna a 'nit'
            $table->string('institucion'); // Cambiar el nombre de columna a 'institucion'
            $table->string('genero');
            $table->string('tipo'); // Agregar la columna 'tipo' antes de 'hora_entrada'
            $table->timestamp('hora_entrada'); // Cambiar el nombre de columna a 'hora_entrada'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamosspace');
    }
}
