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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id()->comment('معرف التغذية الراجعة');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('معرف المستخدم الذي قدم التغذية الراجعة');
            $table->text('content')->comment('محتوى التغذية الراجعة');
            $table->integer('rating')->nullable()->comment('تقييم (من 1 إلى 5، اختياري)');
            $table->enum('type', ['general', 'complaint', 'suggestion'])->default('general')->comment('نوع التغذية الراجعة');
            $table->text('admin_response')->nullable()->comment('رد الإدارة على التغذية الراجعة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
