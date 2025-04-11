<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\MovieApiController;

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::get('/movies', [MovieApiController::class, 'index']);
Route::get('/movies/{id}', [MovieApiController::class, 'show']);

Route::get('/admin', function(){
     return response()->json([
        'message' => 'You are an admin'
    ], 200);
})->middleware('auth:sanctum', 'ApiAdmin'); // Add the middleware to the route
