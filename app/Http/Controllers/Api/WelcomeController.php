<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WelcomeController extends Controller
{
    /**
     * API welcome endpoint
     */
    public function welcome(): JsonResponse
    {
        return response()->json([
            'message' => 'Welcome to Copilot Do Something API',
            'version' => '1.0.0',
            'status' => 'active',
            'timestamp' => now()->toISOString(),
            'framework' => 'Laravel ' . app()->version(),
            'php_version' => PHP_VERSION,
        ]);
    }

    /**
     * Simple health check
     */
    public function health(): JsonResponse
    {
        $requestTime = $_SERVER['REQUEST_TIME_FLOAT'] ?? LARAVEL_START ?? microtime(true);
        return response()->json([
            'status' => 'healthy',
            'timestamp' => now()->toISOString(),
            'uptime' => round(microtime(true) - $requestTime, 3),
        ]);
    }
}