<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KebabProduct;
use App\Models\KebabShops;
use App\Models\Product;

class KebabProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kebabShops = KebabShops::all();
        foreach ($kebabShops as $kebabShop) {
            $products = $kebabShop->user->products;
            foreach ($products as $product) {
                if (rand(0, 10) < 3) {
                    
                    $kebabShop->products()->attach($product->id, ['price' => rand(1, 10)]);
                }
            }
        }
    }
}
