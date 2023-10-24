<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamospcspaceTable extends Migration
{
    public function up()
    {
        Schema::create('prestamospcspace', function (Blueprint $table) {
            $table->id();
            $table->string('pc');
            $table->string('nit');
            $table->string('nombre');
            $table->string('institucion');
            $table->string('tipo');
            $table->string('genero');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamospcspace');
    }
}
