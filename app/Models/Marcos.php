<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcos extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'nroconvenio',
        'anio',
        'firmaconvenio',
        'aprobadoporresolucion',
        'polizanro',
        'vigenciadesde',
        'vigenciahasta',
    ];
}
