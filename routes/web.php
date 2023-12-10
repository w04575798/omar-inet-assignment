<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-admin', [App\Http\Controllers\UserController::class, 'index'])->name('user-admin.index');
Route::get('/user-admin/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/user-admin', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/user-admin', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/user-admin/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/user-admin/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/user-admin/{user}', [UserController::class, 'show'])->name('users.show');
Route::delete('/user-admin/{user}', [UserController::class, 'destroy'])->name('users.destroy');

