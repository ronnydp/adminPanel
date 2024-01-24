<?php

use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\FirebaseController::class, 'index'])->name('home');

Route::get('/create-user', [FirebaseController::class, 'create'])->name('create');
Route::post('/home', [FirebaseController::class, 'store'])->name('store');

Route::get('/usuarios/{id}/edit', [FirebaseController::class, 'edit'])->name('edit');
Route::put('/usuarios/{id}', [FirebaseController::class, 'update'])->name('update');

Route::delete('/usuarios/{id}', [FirebaseController::class, 'destroy'])->name('destroy');
