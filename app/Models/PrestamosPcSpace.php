<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestamosPcSpace extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'prestamospcspace';

    // Columnas que se pueden llenar en masa
    protected $fillable = ['pc', 'nit', 'nombre', 'institucion', 'tipo', 'genero'];

    // No se requiere especificar la marca de tiempo (created_at y updated_at) ya que la tabla ya las incluye por defecto.

    // Puedes definir relaciones aquí si es necesario.
}
