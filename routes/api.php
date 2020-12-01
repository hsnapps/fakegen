<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('types/{category}', [ApiController::class, 'getSubCategories']);
Route::get('render/{category}/{subcategory}', [ApiController::class, 'render']);
