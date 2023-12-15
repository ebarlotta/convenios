<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

    protected $fillable=[
        'marco_id',
        'estudiante_id',
        'periododesde',
        'periodohasta',
        'diasdelasemana',
        'horariosdesdehasta',
        'responsable_id',
        'firmaconvenio',
    ];

    public function estudiante() {
        return $this->hasOne(Estudiantes::class,'id','estudiante_id');
    }

    public function responsable() {
        return $this->hasOne(Responsable::class,'id','responsable_id');
    }

    public function marco() {
        return $this->hasOne(Marcos::class,'id','marco_id');
    }

}
