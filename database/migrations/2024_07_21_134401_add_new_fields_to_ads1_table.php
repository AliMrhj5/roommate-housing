<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToAds1Table extends Migration
{
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {




            $table->string('contact_email')->nullable();
            $table->text('notes')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('status')->default('active');
            $table->integer('partner_age_min')->nullable();
            $table->integer('partner_age_max')->nullable();
            $table->string('partner_gender')->nullable();
            $table->string('accommodation_type')->nullable();

            // تأكد من وجود العلاقات المناسبة إذا كانت الحقول تشير إلى جداول أخرى
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn([
                'ad_type', 'residence_type', 'budget', 'availability_date', 'description', 'preferences',
                'location_description', 'country_id', 'city_id', 'title', 'room_size', 'number_of_rooms',
                'number_of_bathrooms', 'furnished', 'smoking_allowed', 'pets_allowed', 'contact_email',
                'notes', 'contact_phone', 'status', 'partner_age_min', 'partner_age_max', 'partner_gender',
                'accommodation_type'
            ]);

            $table->dropForeign(['country_id']);
            $table->dropForeign(['city_id']);
        });
    }
}

