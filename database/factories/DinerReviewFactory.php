<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Diner;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DinerReview>
 */
class DinerReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::whereHas("roles", function($q){ $q->where("name", "vartotojas"); })->get()->random()->id,
            'diner_id' => Diner::all()->random()->id,
            'comment' => $this->faker->text(100),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
