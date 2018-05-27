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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'api'), function()
{
    Route::get('usuarios', 'api\UsuarioController@listAll');
    Route::get('usuarios/{id}', 'api\UsuarioController@listOne');
    Route::post('usuarios', 'api\UsuarioController@create');
    
});
