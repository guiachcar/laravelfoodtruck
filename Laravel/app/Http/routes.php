<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//index
Route::get('/', 'IndexController@index');

Route::get('cliente', 'IndexController@cliente');

Route::get('food', 'IndexController@food');

//events
Route::get('events', 'EventsController@index');

Route::get('eventsADD', 'EventsController@add');

Route::get('eventsEDIT', 'EventsController@edit');

Route::post('eventsPARTICIPAR', 'EventsController@participar');

Route::get('liberaFoodtrucker', 'EventsController@participarLibera');

Route::post('eventsCadastrar', 'EventsController@cadastrar');

Route::post('eventsEditar', 'EventsController@editar');

Route::get('visualizarEvento','EventsController@view');

//truckers
Route::get('foodtruckers', 'FoodtruckersController@index');

Route::get('foodtruckADD', 'FoodtruckersController@add');

Route::post('foodtruckersCadastrar', 'FoodtruckersController@cadastrar');

Route::get('visualizarFoodtrucker','FoodtruckersController@view');

Route::get('foodtruckersEDIT', 'FoodtruckersController@edit');

Route::post('foodtruckersEditar', 'FoodtruckersController@editar');

//menus
Route::get('menus', 'MenusController@index');

Route::get('menuADD', 'MenusController@add');

Route::post('menusCadastrar', 'MenusController@cadastrar');

Route::get('menusEDIT', 'MenusController@edit');

Route::post('menusEditar', 'MenusController@editar');
Route::get('visualizarMenu', 'MenusController@view');
//produtcts

Route::get('products', 'ProductsController@index');

Route::get('productADD', 'ProductsController@add');

Route::post('productsCadastrar', 'ProductsController@cadastrar');

Route::get('visualizarProduct','ProductsController@view');

Route::get('productsEDIT', 'ProductsController@edit');

Route::post('productsEditar', 'ProductsController@editar');

//locations
Route::get('mapas', 'LocationsController@maps');

Route::post('locationBuscar', 'LocationsController@getLocal');

Route::get('locationMostrar', 'LocationsController@mostrar');

Route::post('locationSalvar', 'LocationsController@cadastrar');

Route::get('show', 'LocationsController@show');

Route::get('/ufs/', function($uf = null){
    return response()->json(\App\Cidade::select('uf')->distinct('uf')->orderBy('uf')->get());
});

Route::get('/cidades/{uf}', function($uf = null){
    return response()->json(\App\Cidade::where('uf', $uf)->orderBy('nome')->get());
});

//users
	//Authentication
	Route::get('login', 'Auth\AuthController@showLoginForm');
	Route::get('login', 'Auth\AuthController@showLoginForm');
	Route::post('login', 'Auth\AuthController@login');
	Route::get('logout', 'Auth\AuthController@logout');

	// Registration Routes...
	Route::get('register', 'Auth\AuthController@showRegistrationForm');
	Route::post('register', 'Auth\AuthController@register');

	        // Password Reset Routes...
	Route::get('reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('reset', 'Auth\PasswordController@reset');
  