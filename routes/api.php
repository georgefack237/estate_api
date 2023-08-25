<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyController;
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

Route::post('/mobile/agents/getProfile', [UserController::class, 'getProfile']);
Route::post('/mobile/getProfile', [AgentController::class, 'getProfile']);

Route::post('mobile/users/register', [UserController::class, 'register']);

Route::post('mobile/users/login', [UserController::class, 'login']);
Route::post('mobile/agents/login', [AgentController::class, 'login']);

Route::post('mobile/users/logout', [UserController::class, 'logout']);
Route::post('mobile/agents/logout', [AgentController::class, 'logout']);


// Property routes
Route::post('mobile/agents/addProperty', [PropertyController::class, 'addProperty']);
Route::post('mobile/agents/uploadPhoto', [PropertyController::class, 'uploadPhoto']);


Route::get('mobile/users/getAllProperties', [PropertyController::class, 'getAllProperties']);
Route::post('mobile/users/getAgentProperties', [PropertyController::class, 'getAgentProperties']);





Route::post('mobile/users/updateUser', [UserController::class, 'updateUser']);
