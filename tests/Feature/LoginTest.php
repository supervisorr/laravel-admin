<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A login test example.
     *
     * @return void
     * @group LoginTest
     * @group test_a_login_request
     */
    public function test_a_login_request(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200)
            // ->assertSeeText("l5-swagger.default.api")
        ;
    }

    /**
     * @return void
     * @group LoginTest
     * @group test_login_should_be_fails
     */
    public function test_login_should_be_fails()
    {
        $userFactory = User::factory();

        $userFactoryDefinition = User::factory()->definition();
        $userFactoryDefinition['account_id'] = 1;

        $mockObjUser = $userFactory->create($userFactoryDefinition);

        $body = [
            'email' => $mockObjUser->email,
            'password' => $mockObjUser->password,
            'remember' => false,
        ];

        $response =  $this->post('/login', $body);

        $response->assertStatus(422);
        $response->assertJsonFragment(['message' => 'The given data was invalid.']);
        $response->assertJsonFragment(['errors' => ['email' => ['Estas credenciales no coinciden con nuestros registros.']]]);
    }

    /**
     * @return void
     * @group LoginTest
     * @group test_login_ok_should_be_redirect
     */
    public function test_login_ok_should_be_redirect()
    {
        $userFactory = User::factory();

        $userFactoryDefinition = User::factory()->definition();
        $userFactoryDefinition['account_id'] = 1;
        $userFactoryDefinition['password'] = bcrypt('secret');

        $mockObjUser = $userFactory->create($userFactoryDefinition);

        $body = [
            'email' => $mockObjUser->email,
            'password' => 'secret',
            'remember' => false,
        ];

        $response =  $this->post('/login', $body, ['Accept' => 'application/json']);
        $response->assertStatus(302);
    }
}
