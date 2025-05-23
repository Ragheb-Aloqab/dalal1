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
        // إنشاء جدول المرفقات
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_path')->comment('مسار الملف');
            $table->string('file_type')->comment('نوع الملف');
            $table->morphs('attachable');
            $table->index(['attachable_id', 'attachable_type']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
