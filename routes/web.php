<?php

use App\Http\Controllers\ZodiakController;
use App\Http\Controllers\PredictionController;
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

Route::get('/', [ZodiakController::class,'index'])->name('home');
Route::get('/show', [ZodiakController::class,'show'])->name('show');
Route::get('/load', [PredictionController::class,'index'])->name('load');
Route::post('/load', [PredictionController::class,'store'])->name('load');
