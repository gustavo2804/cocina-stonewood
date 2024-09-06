<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesOrden extends Model
{
    use HasFactory;

    protected $fillable = ['numero_orden','articulo', 'cantidad', 'precio'];
    protected $table = 'detalles_orden'; 

}
