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
        $productoss=productos::all();
        return view('Admin')->with('productos',$productos)->with('User',$User)->with('ventas',$ventas)->with('productoss',$productoss);

    }
    public function mostrar_Usuarios(Request $req){
        $Users=User::where('nombre', 'Like', "%$req->nombre%")->paginate(8);

        $RUser = DB::table('users')
        ->select('users.nombre', DB::raw('SUM(ventas.total) as TotalUsu'))
        ->join('ventas','ventas.idUsuario','=','users.id')
        ->groupBy('users.nombre')
        ->get();
        return view('VistaUsuarios')->with('User',$Users)->with('RUser',$RUser);
    }
    public function mostrar_Ventas(Request $req){
       // $Ventas=venta::where('id', 'Like', "%%")->paginate(8);
        $Ventas=DB::table('ventas')
                    ->join('users', 'ventas.idUsuario', '=', 'users.id')
                    ->select('ventas.*','users.nombre')
                    ->get();

        $RVentas=DB::table('ventaproductos')
                    ->join('productos','ventaproductos.idProducto','=','productos.id')
                    ->select('ventaproductos.*','productos.nombre')
                    ->get();
        return view('VistaVentas')->with('Ventas',$Ventas)->with('RVentas',$RVentas);
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
    public function actpago($id)
    {
        $venta = venta::find($id);
        if($venta->status == "Pendiente de pago"){
            $venta->status = "Pagado";
        }
        elseif($venta->status == "Pagado"){
            $venta->status = "Pendiente de pago";
        }
        $venta->save();
        return redirect(route('vistaventas'));
        
    }
    public function entrega($id)
    {
        $venta = venta::find($id);

        if($venta->status == "Pagado"){
            $venta->status = "Entregado";
        }
        elseif($venta->status == "Entregado"){
            $venta->status = "Pagado";
        }
        $venta->save();
        return redirect(route('vistaventas'));
        
    }
}
