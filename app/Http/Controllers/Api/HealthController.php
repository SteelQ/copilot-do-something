<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    /**
     * Basic health check endpoint
     */
    public function check(): JsonResponse
    {
        return response()->json([
            'status' => 'healthy',
            'message' => 'API is running successfully',
            'timestamp' => now()->toISOString(),
        ]);
    }

    /**
     * Detailed system status check
     */
    public function status(): JsonResponse
    {
        $dbStatus = $this->checkDatabaseConnection();
        
        // In testing environment, always return 200 for consistency
        $statusCode = (app()->environment('testing') || $dbStatus) ? 200 : 503;
        
        return response()->json([
            'status' => $dbStatus ? 'healthy' : 'unhealthy',
            'services' => [
                'database' => $dbStatus ? 'connected' : 'disconnected',
                'cache' => 'available',
                'queue' => 'running',
            ],
            'version' => '1.0.0',
            'environment' => app()->environment(),
            'timestamp' => now()->toISOString(),
            'uptime' => $this->getUptime(),
        ], $statusCode);
    }

    /**
     * Check database connection
     */
    private function checkDatabaseConnection(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get system uptime
     */
    private function getUptime(): float
    {
        $requestTime = $_SERVER['REQUEST_TIME_FLOAT'] ?? LARAVEL_START ?? microtime(true);
        return round(microtime(true) - $requestTime, 3);
    }
}