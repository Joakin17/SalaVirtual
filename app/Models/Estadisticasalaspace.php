<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estadisticasalaspace extends Model
{
    protected $table = 'estadisticasalaspace';

    protected $fillable = ['mesa', 'puesto', 'nombre', 'carnet', 'facultad', 'carrera', 'genero'];

  
}
