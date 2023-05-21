<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'email' => 'nomads@gmail.com',
            'username' => 'administrator',
            'roles' => 'ADMIN',
            'password' => Hash::make('nomads@gmail.com'),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}
