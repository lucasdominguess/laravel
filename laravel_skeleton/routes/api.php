<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JWTAuthController;

Route::post('/login', [JWTAuthController::class, 'login']);
Route::post('/register', [JWTAuthController::class, 'register']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('/user', [JWTAuthController::class, 'getUser']);
    Route::post('/logout', [JWTAuthController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);
});

Route::post('/test', function (Request $request) {
    return response()->json($request->all());
});

Route::fallback(function () {
    return response(['message' => 'Route not found'], 404);
});
