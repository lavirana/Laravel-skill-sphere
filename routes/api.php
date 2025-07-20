<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);
Route::get('courses', [\App\Http\Controllers\API\CourseController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout',[AuthController::class,'logout']);
    Route::apiResource('posts', PostController::class);
});

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('jwt_login', [AuthController::class, 'jwt_login']);
    Route::post('jwt_register', [AuthController::class, 'jwt_register']);
});

Route::middleware(['auth:api'])->group(function(){
    Route::post('me', [AuthController::class, 'jwt_me']);
    Route::post('logout', [AuthController::class, 'jwt_logout']);
    Route::post('refresh', [AuthController::class, 'jwt_refresh']);
});
