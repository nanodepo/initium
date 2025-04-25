<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Sofia Martinez',
            'email' => 'sofia.martinez@nanodepo.net',
            'password' => Hash::make('1q2w3e4r'),
        ]);
    }
}
