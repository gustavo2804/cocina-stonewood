<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colmado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_articulo','precio', 'precio_venta'];

    protected $table = 'articulos_Venta';
}
