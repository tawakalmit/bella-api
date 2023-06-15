<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [DashboardController::class, 'getDashboard']);

Route::get('/features', [DashboardController::class, 'getFeatures']);
Route::post('/features', [DashboardController::class, 'postFeatures']);
Route::get('/features/{id}/edit', [DashboardController::class, 'editFeatures']);
Route::post('/features/{id}/update', [DashboardController::class, 'updateFeatures']);
Route::delete('/features/{id}/delete', [DashboardController::class, 'deleteFeatures']);

Route::get('/home_banner_tables', [DashboardController::class, 'getBanner']);
Route::post('/home_banner_tables', [DashboardController::class, 'postBanner']);
Route::delete('/home_banner_tables/{id}/delete', [DashboardController::class, 'deleteHomeBanner']);
Route::get('/home_banner_tables/{id}/edit', [DashboardController::class, 'editBanner']);
Route::post('/home_banner_tables/{id}/update', [DashboardController::class, 'updateHomeBanner']);

Route::get('/new_arrival', [DashboardController::class, 'getNewArrival']);
Route::post('/new_arrival', [DashboardController::class, 'postNewArrival']);
Route::delete('/new_arrival/{id}/delete', [DashboardController::class, 'deleteNewArrival']);
Route::get('/new_arrival/{id}/edit', [DashboardController::class, 'editNewArrival']);
Route::post('/new_arrival/{id}/update', [DashboardController::class, 'updateNewArrival']);

Route::get('/product_category', [DashboardController::class, 'getProductCategory']);
Route::post('/product_category', [DashboardController::class, 'postProductCategory']);
Route::delete('/product_category/{id}/delete', [DashboardController::class, 'deleteProductCategory']);
Route::get('/product_category/{id}/edit', [DashboardController::class, 'editProductCategory']);
Route::post('/product_category/{id}/update', [DashboardController::class, 'updateProductCategory']);

Route::get('/products', [DashboardController::class, 'getProducts']);
Route::post('/products', [DashboardController::class, 'postProducts']);
Route::delete('/products/{id}/delete', [DashboardController::class, 'deleteProducts']);
Route::get('/products/{id}/edit', [DashboardController::class, 'editProducts']);
Route::post('/products/{id}/update', [DashboardController::class, 'updateProducts']);

Route::get('/testimonies', [TestimonyController::class, 'index']);
Route::post('/testimonies', [TestimonyController::class, 'create']);
Route::delete('/testimonies/{id}/delete', [TestimonyController::class, 'destroy']);
Route::get('/testimonies/{id}/edit', [TestimonyController::class, 'edit']);
Route::post('/testimonies/{id}/update', [TestimonyController::class, 'update']);

Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'create']);
Route::delete('/posts/{id}/delete', [PostController::class, 'destroy']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::post('/posts/{id}/update', [PostController::class, 'update']);