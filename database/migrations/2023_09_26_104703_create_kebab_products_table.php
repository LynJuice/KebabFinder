<?php

use App\Models\Diner;
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
            $table->foreignId('diner_id')->constrained('diners');
            // $table->foreignId('product_id')->on('products')->refrences('id');
            $table->foreignId('product_id')->constrained('products');
            $table->float('price', 8, 2)->nullable();
            $table->timestamps();
            $table->primary(['diner_id', 'product_id']);
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
