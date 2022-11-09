<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('listagem', [UserController::class, 'listagem'])->name('listagem');

Route::get('listagem/editar/{$user}', [UserController::class, 'editarusuario'])->name('editarusuario');

Route::delete('listagem/destroy/{$user}', [UserController::class, 'destroy'])->name('destroy');

Route::put('listagem/idit/{$user}', [UserController::class, 'edit'])->name('edit');
