<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;

use App\Http\Controllers\Api\Menus\ListMenuController;

use App\Http\Controllers\Api\Menus\ShowMenuController;
use App\Http\Controllers\Api\Places\ListPlaceController;
use App\Http\Controllers\Api\Places\RelatedPlaceController;
use App\Http\Controllers\Api\Places\ShowPlaceController;
use App\Http\Controllers\Api\Places\SearchPlaceController;
use App\Http\Controllers\Api\User\ListFavouritePlaceController;
use App\Http\Controllers\Api\User\StoreFavouritePlaceController;
use App\Http\Controllers\Api\User\DeleteFavouritePlaceController;
use App\Http\Controllers\Api\SubDistrict\ListSubDistrictController;
use App\Http\Controllers\Api\SubDistrict\ShowSubDistrictController;
use App\Http\Controllers\Api\SubDistrict\ListPlaceBySubDistrictController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//AUTH
Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

// LIST TEMPAT KULINER
Route::get('/place', ListPlaceController::class);
Route::get('/place/search', SearchPlaceController::class);
Route::get('/place/{place}', ShowPlaceController::class);
Route::get('/place/{place}/related', RelatedPlaceController::class);

//LIST MENU MAKANAN
Route::get('/place/{place}/menu', ListMenuController::class);
Route::get('/place/{place:id}/menu/{menu:id}', ShowMenuController::class);

//KECAMATAN
Route::get('/sub-district', ListSubDistrictController::class);
Route::get('/sub-district/{subDistrict}', ShowSubDistrictController::class);
Route::get('/sub-district/{subDistrict}/place/', ListPlaceBySubDistrictController::class);

//favourite TEMPAT KULINER BY USER
Route::post('/user/place/{place}/favourite', StoreFavouritePlaceController::class)->middleware('auth:sanctum');
Route::get('/user/place/', ListFavouritePlaceController::class)->middleware('auth:sanctum');
Route::DELETE('/user/place/{place}/favourite', DeleteFavouritePlaceController::class)->middleware('auth:sanctum');
