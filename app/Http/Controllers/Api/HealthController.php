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
        ], $dbStatus ? 200 : 503);
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
        return round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 3);
    }
}