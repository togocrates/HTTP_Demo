test('status code demo routes return correct status', function () {
<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatusCodeDemoTest extends TestCase
{
    /**
     * Test all status code demo routes return correct status.
     */
    public function test_status_code_demo_routes_return_correct_status()
    {
        $routes = [
            'ok' => 200,
            'created' => 201,
            'nocontent' => 204,
            'moved' => 301,
            'bad' => 400,
            'unauthorized' => 401,
            'forbidden' => 403,
            'notfound' => 404,
            'unprocessable' => 422,
            'error' => 500,
        ];
        foreach ($routes as $route => $expected) {
            $response = $this->get("/status/{$route}");
            $response->assertStatus($expected);
        }
    }
}
