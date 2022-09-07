<?php

use App\Http\Controllers\BoardGamesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('board-game')->group(function () {
    Route::post('', [BoardGamesController::class, 'create']);
    // index
    Route::get('', [BoardGamesController::class, 'index']);
    // update
    // delete
    // show
    Route::get('{id}', [BoardGamesController::class, 'show']);
});
