<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user  = factory(User::class, 50)->create();

        factory(User::class, 200)->create()->each(function ($user) {

            $user->profile()->create([
                // 'address'=> $faker->name,
            ]);
        });
    }
}
