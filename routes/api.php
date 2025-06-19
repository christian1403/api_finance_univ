<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DebtController;


Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum')->middleware('role:superadmin');

Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'role:superadmin'])->group(function () {
    Route::apiResource('/debts', DebtController::class);
    // Add other routes that require superadmin role here
});