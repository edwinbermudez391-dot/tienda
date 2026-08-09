<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prenda extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'talla',
        'categoria',
        'estado',
        'imagen',
        'mostrar_spotlight',
        'mostrar_catalogo',
        'mostrar_muro',
    ];

    protected $casts = [
        'mostrar_spotlight' => 'boolean',
        'mostrar_catalogo' => 'boolean',
        'mostrar_muro' => 'boolean',
        'precio' => 'decimal:2',
    ];
}
