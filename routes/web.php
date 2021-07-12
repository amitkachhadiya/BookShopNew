<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController,StateController,UserController,CityController,RoleController,CategoryController,SubCategoryController,VariationController,VariationTypeController};

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

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::resource('/dashboard',DashboardController::class);
Route::resource('/user', UserController::class);
Route::resource('/state', StateController::class);
Route::resource('/city', CityController::class);
Route::resource('/role', RoleController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/subcategory', SubCategoryController::class);
Route::resource('/variationtype', VariationTypeController::class);
Route::resource('/variation', VariationController::class);

