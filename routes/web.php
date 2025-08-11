<?php

use App\Http\Controllers\Api\WelcomeController;
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

// Note: These routes currently have a session manager issue that needs to be resolved
// The API routes (with /api prefix) work correctly without sessions
Route::get('/', [WelcomeController::class, 'welcome']);
Route::get('/health', [WelcomeController::class, 'health']);