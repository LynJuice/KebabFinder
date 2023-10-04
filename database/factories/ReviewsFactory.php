<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\KebabProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
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
            'products_id' => KebabProduct::all()->random()->id,
            'komentaras' => $this->faker->text(100),
            'reitingas' => $this->faker->numberBetween(1, 5), 
        ];
    }
}
