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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->decimal('area', 10, 2)->comment('مساحة الأرض');
            $table->boolean('water')->default(false)->comment('هل يتوفر خط مياه؟');
            $table->boolean('electricity')->default(false)->comment('هل يتوفر خط كهرباء؟');
            $table->boolean('sewage')->default(false)->comment('هل يتوفر خط صرف صحي؟');
            $table->boolean('gas')->default(false)->comment('هل يتوفر خط غاز؟');
            $table->string('access')->nullable()->comment('تفاصيل الوصول إلى الخطوط');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
