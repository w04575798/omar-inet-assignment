<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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
Route::middleware(['check.is.admin'])->group(function () {
    // Admin routes using UserController within the 'user-admin' group
    Route::prefix('user-admin')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
        Route::post('/', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
        Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
        Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    });
});

Route::resource('/posts', PostController::class)->except(['show']);
