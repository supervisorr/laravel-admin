<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A api posts test example.
     */
    public function test_a_api_posts_request(): void
    {
        $response = $this->get('/api/posts');

        // $response->dumpHeaders();
        // $response->dumpSession();
        // $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->has(6)
                    ->first(
                        fn (AssertableJson $json) =>
                        $json
                            ->where('id', 1)
                            ->where('title', 'Title Post 1.1')
                            ->where('content', 'Content Post 1.1')
                            ->where('userId', 1)
                            ->where('author', 'John Doe')
                            ->has('userData.id')
                            ->where('userData.id', 1)
                            ->where('userData.name', 'John Doe')
                            ->where('userData.email', 'johndoe@example.com') // fn (string $email) => str($email)->is('johndoe@example.com'))
                            ->where('userData.owner', true)
                            ->where('userData.photo', null)
                            ->where('userData.created_at', '2023-02-18 17:14:00')
                            ->where('userData.deleted_at', null)
                            ->where('createdAt', '2023-02-18 17:14:00')
                            ->where('deletedAt', null)
                            // ->missing('password')
                            ->etc()
                    )
            );
    }

    /**
     * A api posts ko test example.
     */
    public function test_a_api_post_request_with_empty_body(): void
    {
        $response = $this->post(
            '/api/posts',
            array(),
        );

        $response
            ->assertStatus(220)
            ->assertJson([ 
                    'error' => true,
                    'message' => [
                        'The given data was invalid.',
                    ]
            ]);
   }

    /**
     * A api posts ko test example.
     */
    public function test_a_api_post_request_with_empty_user(): void
    {
        $response = $this->post(
            '/api/posts',
            array(
                'title' => 'Title Post 4.1. Postman',
                'content' => 'Content Post 4.1. Postman',
                'userId' => null,
            ),
        );

        $response
            ->assertStatus(220)
            ->assertHeader('access-control-allow-origin', '*')
            ->assertJson([ 
                    'error' => true,
                    'message' => [
                        'The given data was invalid.',
                    ]
            ]);
    }

    /**
     * A api posts ok test example.
     */
    public function test_a_api_post_request_ok(): void
    {
        $response = $this->post(
            '/api/posts',
            array(
                'title' => 'Title Post 10.1. PostTest',
                'content' => 'Content Post 10.1. PostTest',
                'userId' => 1,
            ),
        );

        $response
            ->assertStatus(201)
            ->assertJson([ 
                'error' => false,
                'message' => [
                    'Post created.',
                ]
            ]);
    }
}
