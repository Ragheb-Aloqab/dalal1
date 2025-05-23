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
        // إنشاء جدول الرسائل
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // معرف الرسالة
            $table->foreignId('conversation_id')->constrained()->onDelete('cascade')->comment('معرف المحادثة'); // المفتاح الأجنبي إلى جدول المحادثات
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade')->comment('معرف المرسل'); // المفتاح الأجنبي إلى جدول المستخدمين (المرسل)
            $table->foreignId(column: 'receiver_id')->constrained('users')->onDelete('cascade')->comment('معرف المستقبل'); // المفتاح الأجنبي إلى جدول المستخدمين (المستقبل)
            $table->text('content')->nullable()->comment('محتوى الرسالة'); // محتوى الرسالة
            $table->string('image')->nullable()->comment('صورة الرسالة'); // صورة الرسالة
            $table->boolean('read')->default(false)->comment('قرأت؟'); // هل تم قراءة الرسالة
            $table->timestamp('read_at')->nullable()->comment('تاريخ القراءة'); // تاريخ قراءة الرسالة
            $table->timestamps(); // تواريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
