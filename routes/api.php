<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoitureController;
use Illuminate\Foundation\Auth\User;
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

Route::post('/adduser', [UserController::class, 'store']);
Route::delete('/deleteuser/{user}', [UserController::class, 'delete']);
Route::put('/updateuser/{user}', [UserController::class, 'update']);

Route::post('/admin', [UserController::class, 'Seeder']);
Route::post('/estimationprice', [VoitureController::class, 'estimationprice']);

Route::middleware('auth:api')->get('/profile', function () {
    Route::post('/auth/login', [AuthenticationController::class, 'authenticate']);
});
Route::post('/login', [AuthenticationController::class, 'authenticate']);

Route::get('/cars', [VoitureController::class, 'index']);
