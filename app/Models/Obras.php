<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obras extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'nombre',
        'clave',
        'objeto',
        'direccion',
        'coordenadas',
        'imagen_id',
        'incidente_id',
    ];
}
