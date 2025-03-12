<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\EmployeeController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::apiResource('companies', AdminCompanyController::class);
        Route::apiResource('employees', AdminEmployeeController::class)->only(['index', 'show', 'destroy']);
    });

    Route::middleware('company')->prefix('company')->group(function () {
        Route::get('profile', [CompanyProfileController::class, 'show']);
        Route::put('profile', [CompanyProfileController::class, 'update']);

        Route::apiResource('employees', EmployeeController::class);
    });
});

Route::fallback(function () {
    return response()->errorJson('Endpoint not found', 404);
});
