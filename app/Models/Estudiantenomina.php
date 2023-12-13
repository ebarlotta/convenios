<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantenomina extends Model
{
    use HasFactory;

    protected $fillable=[
        'estudiante_id',
        'proyecto_id',
    ];
}
