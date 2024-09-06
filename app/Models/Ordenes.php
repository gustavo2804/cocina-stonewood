<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;

    protected $fillable = ['numero_orden','usuario','total'];
    protected $table = 'registro_ordenes'; 
}
