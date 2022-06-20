<?php

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

Route::get('/users', [App\Http\Controllers\API\UserController::class, 'index'])->name('users.index');
Route::get('/messages', [App\Http\Controllers\API\MessageController::class, 'index'])->name('messages.index');
Route::post('/messages/search', [App\Http\Controllers\API\MessageController::class, 'searchMessages'])->name('messages.search');