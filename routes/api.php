<?php

use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\UserController;
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

// Health check endpoints
Route::get('/health', [HealthController::class, 'check']);
Route::get('/status', [HealthController::class, 'status']);

// API v1 routes
Route::prefix('v1')->group(function () {
    
    // User management routes
    Route::apiResource('users', UserController::class);
    
    // Protected routes
    Route::middleware(['throttle:api'])->group(function () {
        
        // Example authenticated routes
        Route::get('/profile', function (Request $request) {
            return response()->json([
                'message' => 'User profile endpoint',
                'user' => $request->user(),
            ]);
        });
        
        // Dashboard data
        Route::get('/dashboard', function () {
            return response()->json([
                'message' => 'Dashboard data',
                'data' => [
                    'total_users' => 0,
                    'active_sessions' => 0,
                    'system_status' => 'operational',
                ],
            ]);
        });
    });
});