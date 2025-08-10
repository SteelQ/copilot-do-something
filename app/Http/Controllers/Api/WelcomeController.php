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
            'timestamp' => date('c'),
            'framework' => 'Laravel ' . app()->version(),
            'php_version' => PHP_VERSION,
        ]);
    }

    /**
     * Simple health check
     */
    public function health(): JsonResponse
    {
        return response()->json([
            'status' => 'healthy',
            'timestamp' => date('c'),
            'uptime' => round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 3),
        ]);
    }
}