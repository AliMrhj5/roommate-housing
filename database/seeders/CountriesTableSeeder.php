<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // إضافة بيانات دولة الإمارات
        $countryId = DB::table('countries')->insertGetId([
            'name' => 'الإمارات العربية المتحدة',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // إضافة بيانات المدن التابعة للإمارات
        DB::table('cities')->insert([
            [
                'name' => 'أبوظبي',
                'country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'دبي',
                'country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'الشارقة',
                'country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'عجمان',
                'country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'رأس الخيمة',
                'country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'الفجيرة',
                'country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'أم القيوين',
                'country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
