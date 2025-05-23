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
        // إنشاء جدول الإشعارات
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary()->comment('معرف الإشعار'); // معرف الإشعار (UUID)
            $table->string('type')->comment('نوع الإشعار'); // نوع الإشعار
            $table->morphs('notifiable'); // المفتاح المتعدد الأشكال (notifiable_id و notifiable_type)
            $table->text('data')->comment('بيانات الإشعار'); // بيانات الإشعار (JSON)
            $table->timestamp('read_at')->nullable()->comment('تاريخ القراءة'); // تاريخ قراءة الإشعار (اختياري)
            $table->timestamps(); // تواريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
