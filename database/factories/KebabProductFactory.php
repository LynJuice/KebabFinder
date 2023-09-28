<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kebab_Product>
 */
class KebabProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // // $table->foreignId('kebab_shops_id')->constrained('kebab_shops');
            // // $table->foreignId('products_id')->constrained('products');
            // 'price' => $this->faker->randomFloat(2, 0, 999999.99),
        ];
    }
}
