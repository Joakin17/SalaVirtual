<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestamoSpaceEstudiante extends Model
{
    protected $table = 'prestamospaceestudiantes';

    protected $fillable = [
        'mesa',
        'puesto',
        'carnet',
        'nombre',
        'apellido',
        'facultad',
        'carrera',
        'genero',
        'hora_entrada'
    ];
}
