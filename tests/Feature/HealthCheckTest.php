<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * Test basic health check endpoint
     */
    public function test_basic_health_check(): void
    {
        $response = $this->get('/api/health');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'timestamp',
            ])
            ->assertJson([
                'status' => 'healthy',
                'message' => 'API is running successfully',
            ]);
    }

    /**
     * Test detailed status endpoint
     */
    public function test_detailed_status_check(): void
    {
        $response = $this->get('/api/status');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'services' => [
                    'database',
                    'cache',
                    'queue',
                ],
                'version',
                'environment',
                'timestamp',
                'uptime',
            ]);
    }

    /**
     * Test home endpoint
     */
    public function test_home_endpoint(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'version',
                'status',
                'timestamp',
            ])
            ->assertJson([
                'message' => 'Welcome to Copilot Do Something API',
                'version' => '1.0.0',
                'status' => 'active',
            ]);
    }
}