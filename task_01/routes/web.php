<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/cars', [CarController::class, 'showAll'])->name('cars');
Route::get('/add', [CarController::class, 'newCar'])->name('new-car');
Route::post('/store-post', [CarController::class, 'storeNewCar'])->name('store-new-car');
