<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\AllTablesController;
use App\Http\Controllers\FeaturesController;

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
