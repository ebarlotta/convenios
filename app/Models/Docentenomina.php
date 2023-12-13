<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentenomina extends Model
{
    use HasFactory;

    protected $fillable=[
        'responsable_id',
        'proyecto_id',
    ];
}
