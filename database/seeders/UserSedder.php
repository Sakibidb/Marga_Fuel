<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'id' => 1
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'nid' => '123466789',
                'role' => 1,
                'mobile' => '01789398972',
                'address' => 'Dhaka',
                'password' => Hash::make('12345678'),
            ]
        );

        User::firstOrCreate(
            [
                'id' => 2
            ],
            [
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'nid' => '1234567689',
                'role' => 2,
                'mobile' => '01712342678',
                'address' => 'Dhaka',
                'password' => Hash::make('12345678'),
            ]
        );

        User::firstOrCreate(
            [
                'id' => 3
            ],
            [
                'name' => 'driver',
                'email' => 'driver@gmail.com',
                'nid' => '1234567889',
                'role' => 3,
                'mobile' => '01712305678',
                'address' => 'Dhaka',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
