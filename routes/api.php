<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:web')->get('/profile', function () {
    Route::post('/auth/login', [AuthenticationController::class, 'authenticate']);
});

// Route::post('/auth/login', [AuthenticationController::class, 'authenticate']);
