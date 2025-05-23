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
        // إنشاء جدول المباني
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->integer('floors_number')->comment('عدد الطوابق');
            $table->integer('apartments_count')->comment('عدد الشقق');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
