<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHoraPrestamoToPrestamospcspace extends Migration
{
    public function up()
    {
        Schema::table('prestamospcspace', function (Blueprint $table) {
            $table->time('hora_prestamo');
        });
    }

    public function down()
    {
        Schema::table('prestamospcspace', function (Blueprint $table) {
            $table->dropColumn('hora_prestamo');
        });
    }
}
