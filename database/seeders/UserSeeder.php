<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [
                'name' => '',
                'email' => 'tiomuhamadnur@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'), // password
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10),
            ],
        ]);

        // Fake users
        // User::factory()->times(9)->create();
    }
}
