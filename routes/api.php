<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/signup',  [AuthController::class, 'signup']);
    Route::post('/signin',  [AuthController::class, 'signin']);
    Route::post('/signout', [AuthController::class, 'signout']);
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/',     [UserController::class, 'index']);
});