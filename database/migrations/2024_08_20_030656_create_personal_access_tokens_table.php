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
        // إنشاء جدول رموز الوصول الشخصية
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id()->comment('معرف الرمز'); // معرف الرمز (ID)
            $table->morphs('tokenable'); // المفتاح المتعدد الأشكال (tokenable_id و tokenable_type)
            $table->string('name')->comment('اسم الرمز'); // اسم الرمز
            $table->string('token', 64)->unique()->comment('قيمة الرمز'); // قيمة الرمز (مميز)
            $table->text('abilities')->nullable()->comment('قدرات الرمز'); // القدرات المسموح بها (اختياري، عادةً JSON)
            $table->timestamp('last_used_at')->nullable()->comment('تاريخ آخر استخدام'); // تاريخ آخر استخدام (اختياري)
            $table->timestamp('expires_at')->nullable()->comment('تاريخ انتهاء الصلاحية'); // تاريخ انتهاء الصلاحية (اختياري)
            $table->timestamps(); // تواريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
