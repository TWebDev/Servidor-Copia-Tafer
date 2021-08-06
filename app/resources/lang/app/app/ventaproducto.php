<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventaproducto extends Model
{
  protected $fillable = [
  'idVenta', 'idProducto', 'Cantidad'
];
}
