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

Route::get('/', 'loteryController@index');

/*Boton "estoy interesado" (index). Enviamos un correo al administrador para avisarle sobre esto. En unos minutos nos pondremos en contacto contigo*/
Route::post('/solicitar', 'loteryController@solicitar')->name('solicitar')
;
/*
cuando yo lo autorice, entonces el usuario podra ingresar al number-list
*/
Route::get('/number-list', 'loteryController@numberForm')->name('numberlist');

/*Ruta para comprar un numero en especifico*/
Route::post('/comprar', 'loteryController@comprar')->name('comprar');

Route::get('/reservar', 'loteryController@reservar')->name('reservar');

Route::post('/autorizar', 'loteryController@autorizar')->name('autorizar');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/***************************************************/

	/*RUTAS PARA CREAR EVENTO */


Route::resource('/sorteo', 'sorteController');

// Route::get('/nuevoevento', 'sorteController@index')->name('nuevoevento');
