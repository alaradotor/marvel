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
});

Auth::routes();

Route::view('/', 'welcome');

Route::get('/inicio','InicioController@index');

Route::view('/datos', 'modulos.datos');
Route::put('/datos', 'UsuariosController@update');

Route::get('/usuarios', 'UsuariosController@index');
Route::get('/crear-usuarios', 'UsuariosController@create');
Route::post('/crear-usuarios', 'UsuariosController@store');
Route::delete('/usuarios/{id}', 'UsuariosController@destroy');

Route::get('/sucursales', 'SucursalesController@index');
Route::get('/crear-sucursales', 'SucursalesController@create');
Route::post('/crear-sucursales', 'SucursalesController@store');
Route::get('/sucursales/{sucursales}/edit', 'SucursalesController@edit');
Route::put('/sucursales/{sucursales}', 'SucursalesController@update')->name('actualizar-sucursal');
Route::delete('/sucursales/{id}', 'SucursalesController@destroy');

Route::get('/ver-comics/{sucursal_id}', 'ComicController@index');

Route::get('/buscar-comics/{sucursal_id}', 'ComicController@create');
Route::post('/buscar-comics/{sucursal}', 'ComicController@store')->name('agregar-comics');

Route::delete('/comics/{comic_id}/{sucursal_id}', 'ComicController@destroy');
Route::get('/comics/{comic_id}', 'ComicController@show');