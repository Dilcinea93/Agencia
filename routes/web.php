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
/*************INDEX*****************/
Route::get('/', 'loteryController@index')->name('index');
Route::post('/request', 'loteryController@request')->name('request')
;
Auth::routes();
/*************INDEX*****************/


//Route::middleware(['authorizationMiddleware',])->group(function () {
Route::get('/numberlist', 'EventController@numberForm')->name('numberlist');
Route::post('/comprar', 'EventController@comprar')->name('comprar');
//});


/***************************************************/

	/*RUTAS PARA EVENTO */
Route::prefix('events')->group(function () {
	Route::resource('/', 'EventController');
	Route::get('/list', 'EventController@eventList');
});
