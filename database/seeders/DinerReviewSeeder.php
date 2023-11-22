<?php

namespace Database\Seeders;

use App\Models\DinerReview;
use App\Models\ReviewPhotoDiner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DinerReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DinerReview::factory()->count(100)->create();
        ReviewPhotoDiner::factory()->count(100)->create();
    }
}
