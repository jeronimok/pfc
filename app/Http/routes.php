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

// Home route...
Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home'
	]
);

// Authentication routes...
Route::get('iniciar-sesion', [
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'login'
	]);
Route::post('iniciar-sesion', 'Auth\AuthController@postLogin');
Route::get('cerrar-sesion', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'logout'
	]);

// Registration routes...
Route::get('registro', [
	'uses' => 'Auth\AuthController@getRegister',
	'as' => 'register'
	]);

Route::post('registro', 'Auth\AuthController@postRegister');

Route::get('confirmation/{token}', [
	'uses' => 'Auth\AuthController@getConfirmation',
	'as' => 'confirmation'
	]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Usuarios autenticados
Route::group(['middleware' => 'auth'], function () {

	// General
	//...

	// Admin de Accion Participativa
	//...

	// Administador de la plataforma
	Route::group(['middleware' => 'role:admin'], function () {

		// Panel de administrador
		Route::get('administracion', [
			'uses' 	=> 'AdminController@getSettings',
			'as' 	=> 'settings'
			]);

	});

});