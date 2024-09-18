<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
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
Route::get('/', [AlbumController::class, 'index'])->name('home');


Route::resource('photos', PhotoController::class);
Route::resource('albums', AlbumController::class);