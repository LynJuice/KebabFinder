<?php

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
        Schema::create('diner_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diner_id')->constrained('diners');
            $table->foreignId('user_id')->constrained('users');
            $table->string('comment');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diner_reviews');
    }
};
