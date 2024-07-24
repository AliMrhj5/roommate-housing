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
        Schema::create('ads', function (Blueprint $table) {
            $table->id(); // معرف الإعلان
            $table->string('title'); // عنوان الإعلان
            $table->text('description')->nullable(); // وصف الإعلان
            $table->decimal('budget', 10, 2)->nullable(); // الميزانية المتاحة
            $table->foreignId('ads_type_id')->constrained('ads_type')->onDelete('cascade'); // ربط بجدول ads_type
            $table->foreignId('residence_type_id')->constrained('residence_type')->onDelete('cascade'); // ربط بجدول residence_type
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ربط بجدول users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
