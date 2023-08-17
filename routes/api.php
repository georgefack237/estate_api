<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('mobile/users/register', [UserController::class, 'register']);
Route::post('mobile/users/login', [UserController::class, 'login']);
Route::post('mobile/agents/login', [AgentController::class, 'login']);

Route::post('mobile/agents/logout', [AgentController::class, 'logout']);
