<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\RegisterServiceManController;

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

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'newLogin']);

Route::post('/ad', [AdvertisementController::class, 'store']);
Route::get('/ads/{id}', [AdvertisementController::class, 'show']);
Route::get('/ads_list/{user_id}', [AdvertisementController::class, 'index']);


Route::post('/register_service_man', [RegisterServiceManController::class, 'store']);
Route::get('/register_services/{id}', [RegisterServiceManController::class, 'index']);

//Route::post('/login', 'AuthController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
