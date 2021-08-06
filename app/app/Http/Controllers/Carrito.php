<?php

namespace App\Http\Controllers;

use App\productos;
use DummyFullModelClass;
use App\venta;
use App\ventaproducto;
use Illuminate\Http\Request;
use Session; 
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

        return redirect()->route('Catalogo');
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
            if (\Session::get('direccion')=="Tienda") {
                $direccion= \Session::get('direccion');
                \Session::put('direccion', $direccion);
            }
            else {
                $direccion= $data->calle . " " . $data->numero . " " . $data->colonia . " " . $data->ciudad . " " . $data->cp . " " . $data->info;
                
                \Session::put('direccion', $direccion);
            
            }
            return view('FinalizarPedido')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega);
        }
        //PayPal
        public function PagarPaypal(Request $data){
            \Session::put('metodopago',$data->metodopago);
            \Session::put('metodoentrega',$data->metodoentrega);
            \Session::put('direccion',$data->direccion);
          $total=$this->total();
          $carrito =\Session::get('carrito');
          $metodopago= \Session::get('metodopago');
          $metodoentrega= \Session::get('metodoentrega');
          $direccion=\Session::get('direccion');

            return view('PagarPaypal')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega);


        }
        //Otros Pagos
        public function PagoOxxo(Request $data){
            \Session::put('metodopago',$data->metodopago);
            \Session::put('metodoentrega',$data->metodoentrega);
            \Session::put('direccion',$data->direccion);
          $total=$this->total();
          $carrito = \Session::get('carrito');
          $metodopago= \Session::get('metodopago');
          $metodoentrega= \Session::get('metodoentrega');
          $direccion=\Session::get('direccion');
          $this->PasoFinal();
          return view('PagoOxxo')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega)->with('direccion',$direccion);

        }

        public function PagoSucursal(Request $data){
            \Session::put('metodopago',$data->metodopago);
            \Session::put('metodoentrega',$data->metodoentrega);
            \Session::put('direccion',$data->direccion);
          $total=$this->total();
          $carrito =\Session::get('carrito');
          $metodopago= \Session::get('metodopago');
          $metodoentrega= \Session::get('metodoentrega');
          $direccion=\Session::get('direccion');
          $this-> PasoFinal();
          return view('PagoSucursal')->with('carro',$carrito)->with('total',$total)->with('metodopago',$metodopago)->with('metodoentrega',$metodoentrega)->with('direccion',$direccion);

        }

        public function PasoFinal(){
          //agregar la venta

          $total=$this->total();
          $_ventas["total"]=$total;
          $_ventas["idUsuario"]=auth()->user()->id;
          $_ventas["direccion"] =\Session::get('direccion');
          $_ventas["metodopago"]=\Session::get('metodopago');
          if(\Session::get('metodopago')=='Paypal'){
            $_ventas["status"]='Pagado';
          }
          else {
            $_ventas["status"]='Pendiente de pago';
          }
          
          venta::create($_ventas);



          //consulta el último id de venta
          $ventas=Venta::orderBy('id','DESC')->take(1)->get('id');
           $idventa=$ventas[0]->id;
          $carrito=\Session::get('carrito');
          foreach($carrito as $ventasproducto){
                //agrega id prod y id usuarios
                $vp["idProducto"]=$ventasproducto->id;
                $vp["idVenta"]=$idventa;
                $vp["idUsuario"]=auth()->user()->id;
                $vp["Cantidad"]=$ventasproducto->cantidadcarro;
                ventaproducto::create($vp);
          }

            //Borrar Carrito
            \Session::put('carrito',array());
            //Redireccionar ruta*/
            if(\Session::get('metodopago')=='Paypal'){
          return view('PasoFinal');
        }

  }


}
