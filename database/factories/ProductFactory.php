<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::whereHas("roles", function($q){ $q->where("name", "kebabines administratorius"); })->get()->random()->id,
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),            
            'image' => "menu-item-" . fake()->numberBetween(1, 7) . ".png",
            'in_stock' => $this->faker->boolean(80), 
        ];
    }
}
