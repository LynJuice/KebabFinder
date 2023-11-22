<?php

namespace Database\Factories;

use App\Models\Diner;
use App\Models\DinerReview;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReviewPhotoDiner;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DinerReview>
 */
class ReviewPhotoDinerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'diner_review_id' => DinerReview::all()->random()->id,
            'user_id' => User::whereHas("roles", function($q){ $q->where("name", "vartotojas"); })->get()->random()->id,
            'image' => $this->faker->imageUrl(640, 480),
        ];
    }
}
