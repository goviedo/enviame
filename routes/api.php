<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
| CRUD Empresa, prefix api
*/

Route::get('empresas', 'App\Http\Controllers\Api\EmpresaController@index');
Route::post('empresas', 'App\Http\Controllers\Api\EmpresaController@save');
Route::get('empresa', 'App\Http\Controllers\Api\EmpresaController@show');
Route::put('empresas', 'App\Http\Controllers\Api\EmpresaController@update');
Route::delete('empresas', 'App\Http\Controllers\Api\EmpresaController@delete');

/*
| Cadena de Texto iguales al reves
*/
Route::post('palindrome', 'App\Http\Controllers\Api\CadenaTextoController@index');

/*
| Persistencia
*/
Route::post('persistir', 'App\Http\Controllers\Api\PersistirController@persistir');


