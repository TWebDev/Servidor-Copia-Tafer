<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\productos;
use App\venta;
use Alert;
use Illuminate\Support\Facades\DB;
class Admin extends Controller
{
    public function mostrar(Request $req){
        $productos=productos::where('nombre', 'Like', "%$req->nombre%")->paginate(8);
        $User=User::where('nombre', 'Like', "%$req->nombre%")->paginate(8);
        $ventas=venta::all();
        return view('Admin')->with('productos',$productos)->with('User',$User)->with('ventas',$ventas);
    }
    public function mostrar_Usuarios(Request $req){
        $Users=User::where('nombre', 'Like', "%$req->nombre%")->paginate(8);
        return view('VistaUsuarios')->with('User',$Users);
    }
    public function mostrar_Ventas(Request $req){
       // $Ventas=venta::where('id', 'Like', "%%")->paginate(8);
        $Ventas=DB::table('ventas')
                    ->join('users', 'ventas.idUsuario', '=', 'users.id')
                    ->select('ventas.*','users.nombre')
                    ->get();
        return view('VistaVentas')->with('Ventas',$Ventas);
    }
    protected function crear(Request $data)
    {
        $file = $data->file('file');
        $file->move('img', $file->getClientOriginalName());
        $data["imagen"]=$file->getClientOriginalName();
        $this->validate($data,[
            'nombre' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required',
        ]);
       productos::create($data->all());
        $productos=productos::where('nombre', 'Like', "%%")->paginate(8);
        $User=User::where('nombre', 'Like', "%%")->paginate(8);
        $ventas=venta::all();
        return view('Admin')->with('productos',$productos)->with('User',$User)->with('ventas',$ventas);
    }

    public function destroyprod($id){
        $producto = productos::find($id);
        $producto->delete();
        return redirect(route('Admin'));
    }
}
