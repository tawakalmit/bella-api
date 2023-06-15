<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\AllTablesController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('homebanner', [HomeBannerController::class, 'getHomeBanner']);
Route::get('alltables', [AllTablesController::class, 'alltables']);
Route::get('features', [FeaturesController::class, 'getFeatures']);
Route::get('new_arrival', [DashboardController::class, 'newArrivalApi']);
Route::get('posts', [PostController::class, 'getPostsApi']);
Route::get('product_category', [DashboardController::class, 'getProductCategoryApi']);
Route::get('products', [DashboardController::class, 'getProductsApi']);
Route::get('testimony', [TestimonyController::class, 'getTestimonies']);