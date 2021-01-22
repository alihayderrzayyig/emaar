<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class addUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name'  => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'phone' => '0780000000000',
        //     'isAdmin' => 1,
        //     'password' => Hash::make('00000000'),
        // ]);

        // User::create([
        //     'name'  => 'Ali Haider',
        //     'email' => 'ali.haider@gmail.com',
        //     'phone' => '07829386530',
        //     'password' => Hash::make('00000000'),
        // ]);

        // User::create([
        //     'name'  => 'Ali Haider2',
        //     'email' => 'ali.haider2@gmail.com',
        //     'phone' => '07829386530',
        //     'password' => Hash::make('00000000'),
        // ]);

        ///////////////////////////////////////////////

        // $user = User::create([
        //     'name'  => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'phone' => '0780000000000',
        //     'isAdmin' => 1,
        //     'password' => Hash::make('00000000'),
        // ])->profile()->create();

        ///////////////////////////////////////////////

        User::create([
            'name'  => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('00000000'),
            'isAdmin' => 1,
        ])->profile()->create([
        'phone' => '0780000000000',
        'governorate'   => 1,
        'district'      => 3,
        'region'        => 'test',
        'completed'     => true,
        'birthdate'     => date('Y/m/d', strtotime("1993-02-22"))
        ]);

        User::create([
            'name'  => 'Ali Haider',
            'email' => 'ali.haider@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('00000000'),
        ])->profile()->create([
            'phone' => '07829386530',
            'governorate'   => 1,
            'district'      => 3,
            'region'        => 'test',
            'completed'     => true,
            'birthdate'     => date('Y/m/d', strtotime("1993-02-22"))
            ]);

        User::create([
            'name'  => 'Ali Haider2',
            'email' => 'ali.haider2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('00000000'),
        ])->profile()->create([
            'phone' => '07829386530',
            'governorate'   => 1,
            'district'      => 3,
            'region'        => 'test',
            'completed'     => true,
            'birthdate'     => date('Y/m/d', strtotime("1993-02-22"))
            ]);
    }
}
