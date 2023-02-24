<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamosalas', function (Blueprint $table) {
            $table->id();
            $table->integer('sala');
            $table->integer('puesto');
            $table->string('nombre');
            $table->integer('estado');
            $table->string('carne');
            $table->string('facultad')->nullable();;
            $table->string('carrera')->nullable();;
            $table->string('genero')->nullable();;
            $table->string('nota')->nullable();;
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
        Schema::dropIfExists('prestamosalas');
    }
}
