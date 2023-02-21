<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A login test example.
     */
    public function test_a_login_request(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
