<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/companies', [CompaniesController::class, 'index']);
Route::post('/tasks/create', [TaskController::class, 'store']);

// Route::get('companies', [TaskController::class, 'index']);

// Route::get('companies', [UsersController::class, 'index']);
// Route::post('companies', [UsersController::class, 'store']);
