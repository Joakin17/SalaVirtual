<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaspaceTable extends Migration
{
    public function up()
    {
        Schema::create('salaspace', function (Blueprint $table) {
            $table->id();
            $table->integer('mesa');
            $table->integer('puesto');
            $table->integer('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salaspace');
    }
}
