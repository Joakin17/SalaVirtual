<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamosspace extends Model
{
    use HasFactory;

    protected $table = 'prestamosspace'; 
    
    protected $fillable = [
        'mesa',
        'puesto',
        'nombre',
        'nit',
        'institucion',
        'genero',
        'tipo',
        'hora_entrada',
    ];

}
