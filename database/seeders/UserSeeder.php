<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        User::create($user)->markEmailAsVerified();
    }
}
