<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptoras extends Model
{
    use HasFactory;

    protected $fillable=[
        'institucionreceptora',
        'dependientereceptora',
        'representadareceptora',
        'dnirepresentante',
        'telefonorepresentante',
        'caracterrepresentante',
        'acreditadopor',
        'domicilioreceptora',
        'ciudadreceptora',
        'correoreceptora',
        'enadelantereceptora',
        'receptora',
    ];

    public function representante() {
        return $this->hasOne(Responsable::class,'id','representadareceptora');
    }
}
