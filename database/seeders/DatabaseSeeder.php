<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  User::factory(10)->create();

        //  User::factory(2)->unverified()->create();
// \App\Models\Task::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Task::factory(10)->create();

        Task::factory()->create([
            'title' => 'title ni siya',
            'description' => 'description ni siya',
            'long_description' => 'long desreption ni ya',
            'completed' => true,
        ]);
    }
}
