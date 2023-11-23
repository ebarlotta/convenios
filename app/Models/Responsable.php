<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreresponsable',
        'dniresponsable',
        'telefonoresponsable',
        'emailresponsable',
        'rol_id',
    ];

    public function rol()
    {
        return $this->hasOne(Roles::class,'id','rol_id');
    }
}
