<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AveController;
use App\Http\Controllers\API\CajaController;
use App\Http\Controllers\API\SeguimientoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('cajas', CajaController::class)->middleware('auth:api');
Route::apiResource('aves', AveController::class)->middleware('auth:api');
Route::apiResource('seguimiento', SeguimientoController::class)->middleware('auth:api');
