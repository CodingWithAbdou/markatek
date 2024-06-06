<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelextends;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            "setting_key" => "website_name_ar",
            "setting_value" => "ماركتك",
            "title_ar" => "اسم الموقع",
            "type_id" => "1",
            "category" => "1",
            "order_by" => "1",
        ]);


        Setting::create([
            "setting_key" => "description_ar",
            "setting_value" => "11",
            "title_ar" => " وصف الموقع ",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);


        Setting::create([
            "setting_key" => "keywords",
            "setting_value" => "11",
            "title_ar" => "الكلمات الدلالية",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "footer_description_ar",
            "setting_value" => "جميع",
            "title_ar" => "وصف الفوتر ",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "favicon",
            "setting_value" => "assets/images/logo.svg",
            "title_ar" => "الأيقونة المفظلة",
            "type_id" => "2",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "logo",
            "setting_value" => "assets/images/logo.svg",
            "title_ar" => "شعار الموقع",
            "type_id" => "2",
            "category" => "1",
            "order_by" => "1",
        ]);
    }
}
