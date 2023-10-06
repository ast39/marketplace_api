<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\CategoryController;
use App\Http\Controllers\V1\OrderController;
use App\Http\Controllers\V1\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


# Auth
Route::prefix('auth')->controller(AuthController::class)->group(function() {

    Route::post('login', 'login');
    Route::get('user', 'user');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});



# Categories
Route::apiResource('category', CategoryController::class);

# Products
Route::apiResource('product', ProductController::class);


Route::middleware('auth:api')->group(function () {

    # Orders
    Route::apiResource('order', OrderController::class);
});


Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact alexandr.statut@gmail.com'
    ], 404);
});

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
