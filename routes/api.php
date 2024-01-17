<?php

use App\Http\Controllers\PersonController;
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

Route::get('/styla/50873/people',[PersonController::class, 'index']);
Route::post('/styla/50873/people',[PersonController::class, 'store']);
Route::get('/styla/50873/people/{id}',[PersonController::class, 'show']);
Route::get('/styla/50873/people/{id}/edit',[PersonController::class, 'edit']);
Route::put('/styla/50873/people/{id}/edit',[PersonController::class, 'update']);
Route::delete('/styla/50873/people/{id}/delete',[PersonController::class, 'destroy']);