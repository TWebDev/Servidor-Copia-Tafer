<?php

namespace App\Http\Controllers;

use App\productos;
use DummyFullModelClass;
use Illuminate\Http\Request;

class Carrito extends Controller
{
    public function __construct()
    {
        if (!\Session::has('carrito')) {
            \Session::put('carrito', array());
        }
        if (!\Session::has('metodopago')) {
            \Session::put('metodopago');
        }
        if (!\Session::has('metodoentrega')) {
            \Session::put('metodoentrega');
        }
        if (!\Session::has('direccion')) {
            \Session::put('direccion');
        }
    }
    //Mostrar carrito
    public function mostrar(){
        $total=$this->total();
        $carrito = \Session::get('carrito');
         return view('Carrito')->with('carro',$carrito)->with('total',$total);
    }
    //Agregar item
    public function agregar(productos $id){
        $producto = productos::find($id)-> first();
        $carrito = \Session::get('carrito');
        $producto -> cantidadcarro = 0;
        $carrito[$producto -> nombre] = $producto;
        $producto -> cantidadcarro = $carrito[$producto -> nombre] -> cantidadcarro +1;
        $carrito[$producto -> nombre] = $producto;
        \Session::put('carrito', $carrito);

        return redirect()->route('carrito');
    }
    //Eliminar Item
    public function eliminar(productos $id)
    {
        $producto = productos::find($id)-> first();
        $carrito = \Session::get('carrito');
        unset($carrito[$producto -> nombre]);
        \Session::put('carrito', $carrito);
        return redirect()->route('carrito');

    }
    //Actualizar Item
    public function actualizar(Request $data)
    {

        $id = $data->id;
        $producto = productos::find($id);
        $cant = $data->cantidadcarro;
        $carrito = \Session::get('carrito');
        $carrito[$producto->nombre]->cantidadcarro = $cant;

        \Session::put('carrito', $carrito);
        return redirect()->route('carrito');
    }
    //Limpiar carrito
    public function limpiar(){
        \Session::put('carrito',array());
        return redirect()->route('carrito');
    }
    //Total
    private function total ()
    {
        $carrito = \Session::get('carrito');
        $total=0;
        foreach ($carrito as $item) {
            $total += $item->precio * $item->cantidadcarro;
        }
        return $total;
    }
    //Proceso venta
        //Metodo pago
        public function MetodoPago()
        {
            $total=$this->total();
            $carrito = \Session::get('carrito');
            return view('MetodoPago')->with('carro',$carrito)->with('total',$total);
        }
        //Metodo Envio
        public function Envio(Request $data)
        {
            if (\Session::get('metodopago')=='Oxxo' or \Session::get('metodopago')=='Paypal' or \Session::get('metodopago')=='Tienda' ) {
                $metodopago =\Session::get('metodopago');
            }
            else{
                $metodopago = $data->payment;
            \Session::put('metodopago', $metodopago);
            }

            $total=$this->total();

            $carrito = \Session::get('carrito');
            if ($metodopago=='Tienda') {
                $direccion='Tienda';
                \Session::put('direccion', $direccion);
                $metodoentrega='Tienda';
                \Session::put('metodoentrega', $metodoentrega);
                return redirect()->route('FinalizarPedido')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega)->with('direccion',$direccion);
            }
            else {
                return view('MetodoEnvio')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago);
            }

        }
        //Domicilio
        public function Domicilio(Request $data)
        {
            $total=$this->total();
            $carrito = \Session::get('carrito');
            $metodoentrega = $data->delivery;
            \Session::put('metodoentrega',$metodoentrega);
            $metodopago= \Session::get('metodopago');
            if ($metodoentrega=='Tienda') {
                $direccion='Tienda';
                \Session::put('direccion', $direccion);
                return redirect()->route('FinalizarPedido')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega)->with('direccion',$direccion);
            }
            else {
                return view('Domicilio')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega);
            }
        }
        //Finalizar pedido
        public function FinalizarPedido(Request $data)
        {

            $total=$this->total();
            $carrito = \Session::get('carrito');
            $metodopago= \Session::get('metodopago');
            $metodoentrega= \Session::get('metodoentrega');
            $direccion= $data->calle . " " . $data->numero . " " . $data->colonia . " " . $data->ciudad . " " . $data->cp . " " . $data->info;

            return view('FinalizarPedido')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega)->with('direccion',$direccion);
        }
        //PayPal
        public function PagarPaypal(Request $data){

          $total=$this->total();
          $carrito =\Session::get('carrito');
          $metodopago= \Session::get('metodopago');
          $metodoentrega= \Session::get('metodoentrega');
          $direccion= $data->calle . " " . $data->numero . " " . $data->colonia . " " . $data->ciudad . " " . $data->cp . " " . $data->info;

            \Session::put('metodopago', $metodopago);
            return view('PagarPaypal')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega);


        }
        //Otros Pagos
        public function PagoOxxo(Request $data){

          $total=$this->total();
          $carrito = \Session::get('carrito');
          $metodopago= \Session::get('metodopago');
          $metodoentrega= \Session::get('metodoentrega');
          $direccion= $data->calle . " " . $data->numero . " " . $data->colonia . " " . $data->ciudad . " " . $data->cp . " " . $data->info;
          return view('PagoOxxo')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega)->with('direccion',$direccion);
          //agregar la venta
        $_ventas->total=$total;
        $_ventas->idUsuario=auth()->user()->id;
        $_ventas->direccion =\Session::get('direccion');
        $_ventas->metodopago=\Session::get('metodopago');
        $_ventas->status='Pago Pendiente';
        dd($_ventas);
        venta::create($_ventas->all());
        dd($_ventas);
        }

        public function PagoSucursal(Request $data){

          $total=$this->total();
          $carrito =\Session::get('carrito');
          $metodopago= \Session::get('metodopago');
          $metodoentrega= \Session::get('metodoentrega');
          $direccion= $data->calle . " " . $data->numero . " " . $data->colonia . " " . $data->ciudad . " " . $data->cp . " " . $data->info;
          return view('PagoSucursal')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega)->with('direccion',$direccion);
          //agregar la venta
                    $_ventas->total=$total;
                    $_ventas->idUsuario=auth()->user()->id;
                    $_ventas->direccion =\Session::get('direccion');
                    $_ventas->metodopago=\Session::get('metodopago');
                    $_ventas->status='Pago Pendiente';
                    venta::create($_ventas->all());
        }

        public function PasoFinal(){
          //agregar la venta
          $_ventas->total=$total;
          $_ventas->idUsuario=auth()->user()->id;
          $_ventas->direccion =\Session::get('direccion');
          $_ventas->metodopago=\Session::get('metodopago');
          $_ventas->status='Pagado';
          venta::create($_ventas->all());

          $total=$this->total();
          //consulta el último id de venta
          $_ultimaId = new venta;
          $_ultimaId->total = $guarda->total;
          $_ultimaId->save();

          $IdGuardada = $_ultimaId->id;

          foreach($carro as $item)
                //agrega id prod y id usuarios
                $ventasproducto->idProducto=\Session::get('');
                $ventasproducto->idUsuario=\Session::get('');
                $ventasproducto->cantidad=\Session::get('');
                ventaproducto::create($ventasproducto->all());
          endoreach

            //Borrar Carrito
            \Session::put('carrito',array());
            //Redireccionar ruta
          return view('PasoFinal');

  }


}
