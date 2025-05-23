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
        Schema::create('user_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
//            $table->foreignId('advertisement_id')->constrained()->onDelete('cascade');
            $table->enum('interaction_type', ['view', 'like', 'share', 'rating', 'favorite']);
            $table->decimal('rating_value', 2, 1)->nullable(); // For ratings (e.g., 4.5)
            $table->unique(['user_id', 'interaction_type']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_interactions');
    }
};
