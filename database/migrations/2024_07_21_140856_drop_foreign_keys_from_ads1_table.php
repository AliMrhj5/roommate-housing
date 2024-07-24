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
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign(['ads_type_id']);
            $table->dropForeign(['residence_type_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->foreign('ads_type_id')->references('id')->on('ads_type')->onDelete('cascade');
            $table->foreign('residence_type_id')->references('id')->on('residence_type')->onDelete('cascade');
        });
    }
};
