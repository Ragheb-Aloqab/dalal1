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
        // إنشاء جدول الشقق
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('floor_number')->default(1)->comment('رقم الطابق');
            $table->integer('rooms_number')->default(1)->comment('عدد الغرف');
            $table->integer('bathrooms_number')->default(1)->comment('عدد الحمامات');
            $table->integer('kitchens_number')->default(1)->comment('عدد المطابخ');
            $table->enum('condition', ['new', 'old'])->default('old')->comment('حالة الشقة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
