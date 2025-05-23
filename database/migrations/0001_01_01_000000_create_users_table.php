<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // إنشاء جدول المستخدمين
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // This will be an unsigned big integer
            $table->string('name')->comment('اسم المستخدم');
            $table->string('email')->unique()->comment('البريد الإلكتروني للمستخدم');
            $table->string('phone')->unique()->comment('رقم الهاتف للمستخدم');
            $table->timestamp('email_verified_at')->nullable()->comment('تاريخ التحقق من البريد الإلكتروني');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade')->comment('المحافظة');
            $table->string('password')->comment('كلمة المرور');
            $table->morphs('userable');
            $table->string('avatar')->nullable()->comment('الصورة الرمزية للمستخدم');
            $table->rememberToken()->comment('رمز تذكر المستخدم');
            $table->timestamps();
        });

        // إنشاء جدول رموز إعادة تعيين كلمة المرور
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary()->comment('البريد الإلكتروني للرمز');
            $table->string('token')->comment('رمز إعادة تعيين كلمة المرور');
            $table->timestamp('created_at')->nullable()->comment('تاريخ إنشاء الرمز');
        });

        // إنشاء جدول الجلسات
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary()->comment('معرف الجلسة');
            $table->foreignId('user_id')->nullable()->index()->comment('معرف المستخدم');
            $table->string('ip_address', 45)->nullable()->comment('عنوان IP');
            $table->text('user_agent')->nullable()->comment('تفاصيل المتصفح');
            $table->longText('payload')->comment('بيانات الجلسة');
            $table->integer('last_activity')->index()->comment('آخر نشاط');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
