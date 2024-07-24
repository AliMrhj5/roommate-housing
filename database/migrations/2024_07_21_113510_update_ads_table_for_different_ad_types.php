<?php

// database/migrations/xxxx_xx_xx_update_ads_table_for_different_ad_types.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdsTableForDifferentAdTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            // أعمدة جديدة لنوع الإعلان "بحث عن سكن"
            $table->integer('number_of_rooms')->nullable();
            $table->integer('number_of_bathrooms')->nullable();
            $table->boolean('furnished')->nullable();
            $table->boolean('smoking_allowed')->nullable();
            $table->boolean('pets_allowed')->nullable();
            $table->string('location')->nullable();
            $table->date('availability_date')->nullable();

            // أعمدة جديدة لنوع الإعلان "بحث عن شريك سكن"
            $table->text('preferences')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            // حذف الأعمدة الجديدة
            $table->dropColumn([
                'number_of_rooms',
                'number_of_bathrooms',
                'furnished',
                'smoking_allowed',
                'pets_allowed',
                'location',
                'availability_date',
                'preferences',
            ]);
        });
    }
}

