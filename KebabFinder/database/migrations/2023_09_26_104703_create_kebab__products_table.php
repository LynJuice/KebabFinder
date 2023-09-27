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
            $table->id();
            $table->foreignId('kebab_shops_id')->constrained('kebab_shops');
            $table->foreignId('products_id')->constrained('products');
            $table->string('name');
            $table->string('description');
            $table->float('price', 8, 2);
            $table->string('image');
            $table->timestamps();
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
