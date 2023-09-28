<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KebabProduct;
use App\Models\KebabShops;
use App\Models\Products;

class KebabProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KebabProduct::factory()->count(10)->create();
         // $table->foreignId('kebab_shops_id')->constrained('kebab_shops');
            // $table->foreignId('products_id')->constrained('products');
            // 'price' => $this->faker->randomFloat(2, 0, 999999.99),
        $kebabShops = KebabShops::all();
        foreach ($kebabShops as $kebabShop) {
            // $kebabShop->products()->attach(Products::where('user_id')->random()->id, ['price' => rand(1, 10)]);
            //  $kebabShop->products()->attach($kebabShop->user->products->random()->id, ['price' => rand(1, 10)]);
            // $products = Products::where('user_id', $kebabShop->user_id)->get();
            $products = $kebabShop->user->products;
            foreach ($products as $product) {
                if (rand(0, 10) < 3) {
                    
                    $kebabShop->products()->attach($product->id, ['price' => rand(1, 10)]);
                }
            }
        }
    }
}
