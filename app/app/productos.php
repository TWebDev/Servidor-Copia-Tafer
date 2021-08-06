<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $fillable = [
        'nombre', 'cantidad', 'precio','imagen','descripcion'
    ];
}
