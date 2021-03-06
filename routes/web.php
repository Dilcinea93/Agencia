
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
Route::get('numberlist/{id}', 'loteryController@numberForm')->name('numberlist');
Route::post('/comprar', 'EventController@comprar')->name('comprar');
//});

Route::get('home','HomeController@index');
Route::get('home2','EventController@indexHome');
/***************************************************/

	/*RUTAS PARA EVENTO */
Route::prefix('events')->group(function () {
	Route::resource('/event', 'EventController');
	Route::get('/list', 'EventController@eventList');
});



// Route::get('suscribe', function (Faker\Generator $faker) {
//     $user = new User();
//     $user->name = $faker->name;
//     $user->email = $faker->email;
//     $user->password = bcrypt($faker->password);
//     $user->notify(new RequestNotification());

//     return view('notified', ['user' => $user]);
// });

// Envia notificaciones a usuarios no registrados
// Route::get('notify', function () {
//     (new User)->forceFill([
//         'name' => request('name'),
//         'email' => request('email'),
//     ])->notify(new \App\Notifications\NewNotification());
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
