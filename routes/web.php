<?php

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
    return view('plantilla.plantilla');
});

Route::resource('cliente','ClienteController');
Route::resource('producto','ProductoController');
Route::resource('ventas','VentaController');
Route::resource('stock','StockController');
Route::resource('reportes','ReportesController');


//Ruta para cambiar visibilidad
Route::get('visibilidad/{id}','ProductoController@visibilidad');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('cliente-list-pdf','ClienteController@exportPdf')->name('cliente.pdf');
Route::get('producto-list-pdf','ProductoController@exportPdf')->name('producto.pdf');
Route::get('stock-list-pdf','StockController@exportPdf')->name('stock.pdf');
Route::get('venta-list-pdf','VentaController@exportPdf')->name('venta.pdf');
