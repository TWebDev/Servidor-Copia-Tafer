<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
  protected $fillable = [
    'total', 'idUsuario', 'direccion','metodopago', 'status'
];
}
