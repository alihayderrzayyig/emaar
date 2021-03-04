<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Situation;
use Faker\Generator as Faker;
/**
 * الحالات
 **/
$factory->define(Situation::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        // 'email' => $faker->unique()->safeEmail,
        // 'phone' => $faker->phoneNumber,
        // 'email_verified_at' => now(),
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // 'remember_token' => Str::random(10),

        'user_id'       => rand(1 , 200),
        'name'          => $faker->name,
        'phone'         => $faker->e164PhoneNumber,
        'governorate'   => rand(1 , 19),
        'district'      => rand(1 , 3),
        'region'        => $faker->name,
        'money'         => rand(15000000 , 20000000),
        'image'         => $faker->imageUrl($width = 640, $height = 480),
        // 'image' => 'img/03.jpg',
        'description'   =>$faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
