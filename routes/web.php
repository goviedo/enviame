<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

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


/*
 * Datos Faker
 */
Route::get('empresa', function () {
    return App\Models\Empresa::factory()->count(10)->create();
});
