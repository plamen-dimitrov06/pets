<?php

use App\Http\Controllers\PetController;
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
Route::get('pets/search', array(PetController::class, 'search'))->name('pets.search');
Route::post('pets/find', array(PetController::class, 'find'))->name('pets.find');
Route::resource('pets', PetController::class)->only('index', 'create', 'store');
