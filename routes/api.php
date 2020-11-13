<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrailerController;

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

// User Routes
// http://localhost/laravel-rest-api/public/api/{funcName} --- testing endpoint
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Trailer Routes
// http://localhost/laravel-rest-api/public/api/{funcName} --- testing endpoint
Route::get('/getAllTrailers', [TrailerController::class, 'getAllTrailers']);
Route::get('/getTrailerById/{id}', [TrailerController::class, 'getTrailerById']);
Route::post('/addTrailer', [TrailerController::class, 'addTrailer']);
