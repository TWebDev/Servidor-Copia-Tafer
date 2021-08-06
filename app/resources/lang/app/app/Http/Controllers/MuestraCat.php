<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\productos;
class MuestraCat extends Controller
{
    
    public function mostrar(Request $req){
        $productos=productos::where('nombre', 'Like', "%$req->nombre%")->paginate(8);
        return view('Catalogo')->with('productos',$productos);
    }

    public function detalle($id){
        $producto = productos::find($id);
        return view('DetalleProd')->with('producto',$producto);
    }
}
