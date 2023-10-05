<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaspace extends Model
{
    use HasFactory;

    protected $table = 'salaspace'; 

    protected $fillable = [
        'mesa',
        'puesto',
        'estado',
    ];

}
