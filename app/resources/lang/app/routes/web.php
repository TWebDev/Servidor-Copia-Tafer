<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);





Route::get('/Catalogo','MuestraCat@mostrar')->name('Catalogo');


Route::get('Catalogo/{id}/detalle',[
    'uses' => 'Muestracat@detalle'
])->name('detalleprod');







//Carrito

Route::get('carrito/mostrar',[
    'uses' => 'Carrito@mostrar'
])->name('carrito');
Route::get('carrito/agregar/{id}',[
    'middleware' => 'auth',
    'uses' => 'Carrito@agregar'
])->name('carritoAgr');
Route::get('carrito/eliminar/{id}',[
    'uses' => 'Carrito@eliminar'
])->name('carritoElim');
Route::get('carrito/limpiar',[
    'uses' => 'Carrito@limpiar'
])->name('carritoLimp');
Route::post('carrito/actualizar',[
    'uses' => 'Carrito@actualizar'
])->name('actualiza');


//Admin
Route::get('/Admin','Admin@mostrar')->name('Admin');


Route::get('Admin/ventas',[
    'uses' => 'Admin@mostrar_Ventas'
])->name('vistaventas');

//Admin.Productos

Route::post('Admin/agregar',[
    'uses' => 'Admin@crear'
])->name('agregaprod');

Route::get('Admin/{id}/destroy',[
    'uses' => 'Admin@destroyprod'
])->name('eliminarprod');

Route::get('Admin/agregar', function () {
    return view('AgregarProd');
})->name('vistaProd');


Route::get('Admin/usuarios',[
    'uses' => 'Admin@mostrar_Usuarios'
])->name('usuarios');

//Proceso venta
Route::get('carrito/MetodoPago',[
    'uses' =>'Carrito@MetodoPago']) ->name('MetodoPago');
    //Metodo Envio
    Route::get('carrito/Envio', [
      'uses' =>'Carrito@Envio']) ->name('MetodoEnvio');
      Route::post('carrito/Envio', [
        'uses' =>'Carrito@Envio']) ->name('MetodoEnvio');
    //Domicilio
    Route::get('carrito/Domicilio', [
      'uses' =>'Carrito@Domicilio']) ->name('Domicilio');
    //Finalizar Pedido
    Route::get('carrito/FinalizarPedido',[
        'uses' =>'Carrito@FinalizarPedido']) ->name('FinalizarPedido');

// Paypal
//Enviar pedido PayPal
Route::get('payment', array(
      'as'=> 'payment',
      'uses' => 'PaypalController@postPayment', ));
//Paypal redirecciona a esta ruta
Route::get('payment/status', array(
      'as' => 'payment.status',
      'uses' => 'PaypalController@getPaymentStatus', ));

      Route::get('carrito/PagarPaypal/exito',[
        'uses' =>'Carrito@PaypalExito'])->name('PaypalExito');
        //Enviar a la vista de PayPal
        Route::get('carrito/PagarPaypal', [
          'uses' =>'Carrito@PagarPaypal']) ->name('PagarPaypal');
          //Enviar a la vista de OXXO
          Route::get('carrito/PagoOxxo',[
            'uses' =>'Carrito@PagoOxxo']) ->name('PagoOxxo');
          //Enviar a la vista de pago a sucursal
          Route::get('carrito/PagoSucursal',[
            'uses' =>'Carrito@PagoSucursal']) ->name('PagoSucursal');
            //Enviar a Pago Exitoso
      Route::get('carrito/PasoFinal', [
        'uses' =>'Carrito@PasoFinal']) ->name('PasoFinal');
