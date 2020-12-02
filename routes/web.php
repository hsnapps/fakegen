<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'home']);
Route::post('/add', [HomeController::class, 'addFeild'])->name('add');
Route::post('/remove-all', [HomeController::class, 'removeAllRows'])->name('remove-all');
Route::post('/remove', [HomeController::class, 'removeRow'])->name('remove');
