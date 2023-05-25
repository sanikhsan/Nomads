<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@nomads.com',
                'username' => 'administrator',
                'roles' => 'ADMIN',
                'nationality' => 'ID',
                'is_visa' => true,
                'doe_passport' => Carbon::now()->addYear(5),
                'password' => Hash::make('admin@nomads.com'),
                'email_verified_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Customer Satu',
                'email' => 'satu@gmail.com',
                'username' => 'cus-satu',
                'nationality' => 'ID',
                'doe_passport' => Carbon::now()->addYear(3),
                'password' => Hash::make('satu@gmail.com'),
                'email_verified_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Customer Dua',
                'email' => 'dua@gmail.com',
                'username' => 'cus-dua',
                'nationality' => 'MY',
                'is_visa' => true,
                'doe_passport' => Carbon::now()->addYear(1),
                'password' => Hash::make('dua@gmail.com'),
                'email_verified_at' => date('Y-m-d H:i:s', time()),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
        
    }
}
