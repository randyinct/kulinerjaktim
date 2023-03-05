<?php

use App\Models\SubDistrict;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/home', function () {
    return view('welcome');
    })->name('home');
    
    Route::get('/sub-district', SubDistrictController::class)->name('subdistrict.index');

    Route::resource('/category', CategoryController::class);
    
    Route::resource('/place', PlaceController::class);

    Route::resource('/place/{place}/menu', PlaceMenuController::class)->scoped();
});




