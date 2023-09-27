<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Produktas 1',
                'description' => 'Aprasymas Produktui 1',
                'price' => 19.99,
                'in_stock' => true,
            ],
            [
                'name' => 'Product 2',
                'description' => 'Aprasymas Produktui 2',
                'price' => 24.99,
                'in_stock' => true,
            ],
        ];

    }
}
