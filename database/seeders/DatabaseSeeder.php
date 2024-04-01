<?php

namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'atomblastt',
            'password' => bcrypt('password123'),
        ]);
    }
}
