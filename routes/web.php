<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
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
    return view('principal');
});

/*******************REGISTER********************/
Route::get('/register', [RegisterController::class,'index'])->name('register_index');
Route::post('/register', [RegisterController::class,'store'])->name('register_create');

/*******************POST********************/
Route::get('/muro',[PostController::class,'index'])->name('post_index');
