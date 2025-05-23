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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade')->comment('المحافظة');
            $table->longText('description')->comment('وصف العقار');
            $table->text('boundaries')->comment('حدود العقار');
            $table->string('location')->comment('الموقع');
            $table->decimal('price', 15, 2)->comment('السعر');
            $table->enum('status', ['rent', 'sale'])->comment('حالة العقار: للإيجار أو للبيع');
            $table->string('commercial_number')->comment('الرقم التجاري');
            $table->morphs('real_estateable');
            $table->timestamps();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->index(['latitude', 'longitude']);
            $table->index(['real_estateable_id', 'real_estateable_type']);
            $table->foreignId('advertisement_id')->constrained('advertisements')->onDelete('cascade'); // Link to advertisements
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
