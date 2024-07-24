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
        Schema::create('ads_type', function (Blueprint $table) {
            $table->id(); // معرف نوع الإعلان
            $table->string('name'); // اسم نوع الإعلان
            $table->text('description')->nullable(); // وصف نوع الإعلان
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads_type');
    }
};
