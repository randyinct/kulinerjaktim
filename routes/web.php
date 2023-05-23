<?php

use App\Models\SubDistrict;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlaceMenuController;
use App\Http\Controllers\SubDistrictController;

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
Route::redirect('/', 'login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', DashboardController::class, 'index')->name('home');
    
    Route::resource('/sub-district', SubDistrictController::class);

    Route::resource('/category', CategoryController::class);
    
    Route::resource('/place', PlaceController::class);

    Route::resource('/user/review', ReviewController::class);

    Route::resource('/place/{place}/menu', PlaceMenuController::class)->scoped();
});




