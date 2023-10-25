<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\KebabProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kebab_shop_product = KebabProduct::all()->random();
        return [
            'user_id' => User::whereHas("roles", function($q){ $q->where("name", "vartotojas"); })->get()->random()->id,
            'kebab_shop_id' => $kebab_shop_product->kebab_shops_id,
            'product_id' => $kebab_shop_product->product_id,
            'comment' => $this->faker->text(100),
            'rating' => $this->faker->numberBetween(1, 5), 
        ];
    }
}
