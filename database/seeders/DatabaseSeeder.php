<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Organization;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::create(['name' => 'Acme Corporation']);

        $objUser = User::factory()->create([
            'account_id' => $account->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'owner' => true,
        ]);

        $objUsers = User::factory(5)->create(['account_id' => $account->id]);

        $organizations = Organization::factory(100)
            ->create(['account_id' => $account->id]);

        Post::factory()->create(['user_id' => $objUser->id]);
        
        Post::factory(9)
            ->create(['user_id' => $objUser->id])
            ->each(function ($post) use ($objUsers) {
                $post->update(['user_id' => $objUsers->random()->id]);
            });

    }
}
