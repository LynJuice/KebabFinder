<?php

use App\Models\KebabShops;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kebab_products', function (Blueprint $table) {
            $table->foreignId('kebab_shops_id')->constrained('kebab_shops');
            $table->foreignId('products_id')->constrained('products');
            $table->float('price', 8, 2)->nullable();
            $table->timestamps();
            $table->primary(['kebab_shops_id', 'products_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebab_products');
    }
};
