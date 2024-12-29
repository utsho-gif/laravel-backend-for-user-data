<?php

use App\Http\Controllers\UserProfileController;
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

Route::group(['middleware' => ['static.token']], function () {});
Route::get('/users', [UserProfileController::class, 'index']);
Route::get('/users/{id}', [UserProfileController::class, 'show']);
Route::post('/users', [UserProfileController::class, 'store']);
