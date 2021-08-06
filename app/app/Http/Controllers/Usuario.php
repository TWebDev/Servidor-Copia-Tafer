<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\productos;
use App\venta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Usuario extends Controller
{
    public function historial()
    {
        $pedidos=venta::where('idUsuario', 'Like', auth()->user()->id)->get();
        return view('Historial_productos')->with('pedidos',$pedidos);;
    }
    public function cambiarcon(Request $data)
    {
        $data->validate([
            'password_old' => ['required'],
            'password_1' => ['required'],
            'password_2' => ['same:password_1'],
        ]);
        $user=User::find(auth()->user()->id);
        $user->password=Hash::make($data->password_1);
        $user->save();
        return route('home');
        
    }
    public function cambiardat(Request $data)
    {
        $data->validate([
            'nombre' => ['required'],
            'email' => ['required'],
            'telefono' => ['required'],
        ]);
        $user=User::find(auth()->user()->id);
        $user->nombre=$data->nombre;
        $user->email=$data->email;
        $user->telefono=$data->telefono;
        $user->save();
        return route('home');
    }
}
