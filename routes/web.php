<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can reg ister web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/movies',[MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create',[MovieController::class, 'create'])->name('movies.create');
Route::post('/movies',[MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{movie}/edit',[MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movies/{movie}/update',[MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}/destroy',[MovieController::class, 'destroy'])->name('movies.destroy');