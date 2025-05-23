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
        // إنشاء جدول مزودي الخدمة
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name')->default('مكتب');
            $table->longText('description')->nullable();
            $table->string('location')->comment('الموقع');
            $table->string('commercial_number')->unique()->comment('رقم السجل التجاري');
            $table->string('commercial_certificate_image')->nullable()->comment('صورة السجل التجاري');
            $table->string('personal_id_image')->nullable()->comment('صورة البطاقة الشخصية');
            $table->string('personal_id_number')->unique()->comment('رقم البطاقة الشخصية');
            $table->enum('account_status', ['active', 'inactive', 'suspended'])->default('inactive')->comment('حالة الحساب');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
