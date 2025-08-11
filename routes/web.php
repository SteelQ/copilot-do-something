<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Copilot Do Something API',
        'version' => '1.0.0',
        'status' => 'active',
        'timestamp' => date('c'),
        'framework' => 'Laravel ' . app()->version(),
        'php_version' => PHP_VERSION,
    ]);
});

// Redirect /health to /api/health to avoid session conflicts  
Route::redirect('/health', '/api/health');