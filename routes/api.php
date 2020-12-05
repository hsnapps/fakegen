<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [ApiController::class, 'getCategories']);
Route::get('types/{category}', [ApiController::class, 'getSubCategories']);
Route::get('render/{category}/{subcategory}', [ApiController::class, 'render']);
Route::get('message/{key}', [ApiController::class, 'getMessage']);
Route::get('buttons', [ApiController::class, 'getButtons']);
