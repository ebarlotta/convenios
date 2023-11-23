<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreestudiante',
        'dniestudiante',
        'domicilioestudiante',
        'provincia_id',
        'emailestudiante',
        'telefonoestudiante',
        'carrera_id',
        'tareasasignadas',
        'cuil',
        'fechanacimiento',
        'legajo',
        'polizanro',
        'vigenciadesde',
        'vigenciahasta',
    ];

    public function provincia()
    {
        return $this->hasOne(Provincias::class,'id','provincia_id');
    }

    public function carrera()
    {
        return $this->hasOne(Provincias::class,'id','carrera_id');
    }
}
