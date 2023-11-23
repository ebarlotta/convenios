<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    protected $fillable = [
        'anio',
        'descripciondelapropuesta',
        'intencionalidadpedagógica',
        'relacionconlaslineasdeacciondelpei',
        'determinaciondeestudiantesdocentes',
        'localizacionfisicaycobertura',
        'tareasarealizar',
        'cronogramaseactividades',
        'detalledefondos',
        'responsable_id',
        'documentaciondetransporte ',
        'polizasegurodge',
    ];
}
