<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\MovieApiController;

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
     Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
     Route::get('/movies', [MovieApiController::class, 'index']);
     Route::get('/movies/{id}', [MovieApiController::class, 'show']);
     
     Route::middleware('ApiAdmin')->group(function () {
         Route::post('/movies', [MovieApiController::class, 'store']);
         Route::put('/movies/{id}', [MovieApiController::class, 'update']);
         Route::delete('/movies/{id}', [MovieApiController::class, 'destroy']);
     });
     
    });

