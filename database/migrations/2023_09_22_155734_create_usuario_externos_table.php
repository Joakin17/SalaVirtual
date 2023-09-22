<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioExternosTable extends Migration
{
   public function up()
   {
       Schema::create('usuario_externos', function (Blueprint $table) {
           $table->id();
           $table->string('nit')->unique();
           $table->string('nombre');
           $table->string('genero');
           $table->string('institucion');
           $table->string('tipo');
           $table->timestamps();
       });
   }

   public function down()
   {
       Schema::dropIfExists('usuario_externos');
   }
}
