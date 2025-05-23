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
        // إنشاء جدول الميزات
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('real_estate_id')->comment('معرف العقار');
            $table->string('name')->comment('اسم الميزة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
