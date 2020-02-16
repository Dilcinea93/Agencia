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
Route::get('/number-list', 'sorteController@numberForm')->name('numberlist');

/*Ruta para comprar un numero en especifico*/

//Route::middleware(['authorizationMiddleware',])->group(function () {
    
Route::post('/comprar', 'sorteController@comprar')->name('comprar');
//Route::post('/comprar', 'loteryController@comprar')->name('comprar');
	Route::get('/reservar', 'loteryController@reservar')->name('reservar');

	//Route::post('/autorizar', 'loteryController@autorizar')->name('autorizar');
//});


Route::name('print')->get('/imprimir', 'sorteController@imprimir');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/***************************************************/

	/*RUTAS PARA EVENTO */
Route::prefix('events')->group(function () {

	Route::get('index','sorteController@index');
	Route::resource('/sorteo', 'sorteController');
});
