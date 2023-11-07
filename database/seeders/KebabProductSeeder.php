<?php

namespace Database\Seeders;

use App\Models\Diner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KebabProduct;
use App\Models\Product;

class KebabProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diners = Diner::all();
        foreach ($diners as $diner) {
            $products = $diner->user->products;
            foreach ($products as $product) {
                if (rand(0, 10) < 3) {
                    $diner->products()->attach($product->id, ['price' => rand(1, 10)]);
                }
            }
        }
    }
}
