<?php

header('Content-Type: application/json');

echo json_encode([
    'status' => 'success',
    'message' => 'PHP Backend API is working!',
    'framework' => 'Laravel 10.x',
    'php_version' => PHP_VERSION,
    'timestamp' => date('Y-m-d H:i:s'),
    'endpoints' => [
        'GET /test.php' => 'Simple API test endpoint',
        'GET /health' => 'Application health check',
        'GET /api/status' => 'Detailed system status',
        'GET /api/v1/users' => 'User management API'
    ]
]);