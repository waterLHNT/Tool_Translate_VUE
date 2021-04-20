<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Route;
//Update
use App\Http\Controllers\Auth\TranslationsController;

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
Route::get('translations/window/update/{id}', [TranslationsController::class, 'edit']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);
    //Users
    Route::get('user', [UserController::class, 'current']);
    Route::get('users/list', [UserController::class, 'index']);
    Route::patch('users/create', [UserController::class, 'store']);
    Route::get('users/delete/{id}', [UserController::class, 'delete']);
    Route::get('users/update/{id}', [UserController::class, 'edit']);
    Route::patch('users/update/{id}', [UserController::class, 'update']);

    //Translations
    Route::patch('translations/create', [TranslationsController::class, 'store']);



    Route::patch('settings/profile', [ProfileController::class, 'update']);
    Route::patch('settings/password', [PasswordController::class, 'update']);
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
});
