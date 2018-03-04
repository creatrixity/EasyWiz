<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Framework\User::class, 10)->create()->each(function ($user) {
            $user->profile()->create([
                'user_id' => $user->id
            ]);
        });
    }
}
