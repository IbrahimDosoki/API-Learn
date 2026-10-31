<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/tasks', [TaskController::class, 'index']);
// Route::post('/tasks', [TaskController::class, 'store']);
// Route::put('/tasks/{id}', [TaskController::class, 'update']);
// Route::get('/tasks/{id}', [TaskController::class, 'show']);
// Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);


Route::apiResource('tasks', TaskController::class);
Route::post('profile', [ProfileController::class, 'store']);
Route::get('profile/{id}', [ProfileController::class, 'show']);
Route::put('profile/{id}', [ProfileController::class, 'update']);
Route::delete('profile/{id}', [ProfileController::class, 'destroy']);

Route::get('/user/{id}/profile', [UserController::class, 'getProfile']);
