<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\AddController::class, 'index'])->name('home');
Route::get('/{id}', [\App\Http\Controllers\AddController::class, 'create'])->name('create');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/create', [\App\Http\Controllers\AddController::class, 'create'])->name('createAdd');
Route::post('/save', [\App\Http\Controllers\AddController::class, 'save'])->name('save');
Route::get('/{id}', [\App\Http\Controllers\AddController::class, 'show'])->name('show');
Route::get('/edit/{id}', [\App\Http\Controllers\AddController::class, 'edit'])->name('edit');
Route::any('/update/{id}', [\App\Http\Controllers\AddController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [\App\Http\Controllers\AddController::class, 'destroy'])->name('delete');

Route::get('/callback', [\App\Http\Controllers\DropboxController::class, 'callback']);


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
