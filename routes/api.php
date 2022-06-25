<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix( '/products' )->group( function () {
    Route::get( '/', [ProductController::class, 'index'] );
    Route::get( '/paginated', [ProductController::class, 'paginated'] );
} );

Route::prefix( '/product' )->group( function () {
    Route::post( '/store', [ProductController::class, 'store'] );
    Route::put( '/{id}', [ProductController::class, 'update'] );
    Route::delete( '/{id}', [ProductController::class, 'destroy'] );
} );

Route::prefix( '/categories' )->group( function () {
    Route::get( '/', [CategoryController::class, 'index'] );
    Route::get( '/paginated', [CategoryController::class, 'paginated'] );
} );

Route::prefix( '/category' )->group( function () {
    Route::post( '/store', [CategoryController::class, 'store'] );
    Route::put( '/{id}', [CategoryController::class, 'update'] );
    Route::delete( '/{id}', [CategoryController::class, 'destroy'] );
} );
