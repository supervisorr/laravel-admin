<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'account_id' => Account::create(['name' => 'Acme Corporation'])->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'owner' => true,
        ]);

        $organization = $this->user->account->organizations()->create(['name' => 'Example Organization Inc.']);

        $this->user->account->posts()->createMany([
            [
                'organization_id' => $organization->id,
                'first_name' => 'Martin',
                'last_name' => 'Abbott',
                'email' => 'martin.abbott@example.com',
                'phone' => '555-111-2222',
                'address' => '330 Glenda Shore',
                'city' => 'Murphyland',
                'region' => 'Tennessee',
                'country' => 'US',
                'postal_code' => '57851',
            ], [
                'organization_id' => $organization->id,
                'first_name' => 'Lynn',
                'last_name' => 'Kub',
                'email' => 'lynn.kub@example.com',
                'phone' => '555-333-4444',
                'address' => '199 Connelly Turnpike',
                'city' => 'Woodstock',
                'region' => 'Colorado',
                'country' => 'US',
                'postal_code' => '11623',
            ],
        ]);
    }

    public function test_can_view_posts()
    {
        $this->actingAs($this->user)
            ->get('/posts')
            ->assertInertia(fn ($assert) => $assert
                ->component('posts/Index')
                ->has('posts.data', 2)
                ->has('posts.data.0', fn ($assert) => $assert
                    ->where('id', 1)
                    ->where('name', 'Martin Abbott')
                    ->where('phone', '555-111-2222')
                    ->where('city', 'Murphyland')
                    ->where('deleted_at', null)
                    ->has('organization', fn ($assert) => $assert
                        ->where('name', 'Example Organization Inc.')
                    )
                )
                ->has('posts.data.1', fn ($assert) => $assert
                    ->where('id', 2)
                    ->where('name', 'Lynn Kub')
                    ->where('phone', '555-333-4444')
                    ->where('city', 'Woodstock')
                    ->where('deleted_at', null)
                    ->has('organization', fn ($assert) => $assert
                        ->where('name', 'Example Organization Inc.')
                    )
                )
            );
    }

    public function test_can_search_for_posts()
    {
        $this->actingAs($this->user)
            ->get('/posts?search=Martin')
            ->assertInertia(fn ($assert) => $assert
                ->component('posts/Index')
                ->where('filters.search', 'Martin')
                ->has('posts.data', 1)
                ->has('posts.data.0', fn ($assert) => $assert
                    ->where('id', 1)
                    ->where('name', 'Martin Abbott')
                    ->where('phone', '555-111-2222')
                    ->where('city', 'Murphyland')
                    ->where('deleted_at', null)
                    ->has('organization', fn ($assert) => $assert
                        ->where('name', 'Example Organization Inc.')
                    )
                )
            );
    }

    public function test_cannot_view_deleted_posts()
    {
        $this->user->account->posts()->firstWhere('first_name', 'Martin')->delete();

        $this->actingAs($this->user)
            ->get('/posts')
            ->assertInertia(fn ($assert) => $assert
                ->component('posts/Index')
                ->has('posts.data', 1)
                ->where('posts.data.0.name', 'Lynn Kub')
            );
    }

    public function test_can_filter_to_view_deleted_posts()
    {
        $this->user->account->posts()->firstWhere('first_name', 'Martin')->delete();

        $this->actingAs($this->user)
            ->get('/posts?trashed=with')
            ->assertInertia(fn ($assert) => $assert
                ->component('posts/Index')
                ->has('posts.data', 2)
                ->where('posts.data.0.name', 'Martin Abbott')
                ->where('posts.data.1.name', 'Lynn Kub')
            );
    }
}