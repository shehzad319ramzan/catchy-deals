<?php

use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Simple API for Next.js developer - only list and store products
|
*/

Route::prefix('v1')->group(function () {

    // List all products (public)
    Route::get('/get-products', [ProductApiController::class, 'index']);

    // Add new product (public - no authentication required)
    Route::post('/products', [ProductApiController::class, 'store']);

});
