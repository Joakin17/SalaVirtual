<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosExternosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios_externos', function (Blueprint $table) {
            $table->id();
            $table->string('Nit')->unique();
            $table->string('nombre');
            $table->string('Genero');
            $table->string('Institucion');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios_externos');
    }
}
