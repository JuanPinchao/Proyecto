<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'precio',
        'cantidad',
        'categorias_id',
        'subcategorias_id',
        'estado'
    ];


}
