<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // add permissions
        $this->call(PermissionSeeder::class);
        $this->call(DinerSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(KebabProductSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(DinerReviewSeeder::class);
    }
}
