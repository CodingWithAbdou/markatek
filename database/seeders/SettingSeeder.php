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
            "title_en" => "Website Name",
            "type_id" => "1",
            "category" => "1",
            "order_by" => "1",
        ]);


        Setting::create([
            "setting_key" => "description_ar",
            "setting_value" => "11",
            "title_ar" => " وصف الموقع ",
            "title_en" => " Website Description ",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);


        Setting::create([
            "setting_key" => "keywords",
            "setting_value" => "11",
            "title_ar" => "الكلمات الدلالية",
            "title_en" => "Keywords",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "footer_description_ar",
            "setting_value" => "جميع",
            "title_ar" => "وصف الفوتر ",
            "title_en" => "Footer Description",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "favicon",
            "setting_value" => "assets/images/logo.svg",
            "title_ar" => "الأيقونة المفظلة",
            "title_en" => "Favicon",
            "type_id" => "2",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "logo",
            "setting_value" => "assets/images/logo.svg",
            "title_ar" => "شعار الموقع",
            "title_en" => "Logo",
            "type_id" => "2",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "facebook",
            "setting_value" => "11",
            "title_ar" => "حساب الفيسيوك",
            "title_en" => "Facebook",
            "type_id" => "1",
            "category" => "3",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "instagram",
            "setting_value" => "11",
            "title_ar" => "حساب الإنستقرام",
            "title_en" => "Instagram",
            "type_id" => "1",
            "category" => "3",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "whatsapp",
            "setting_value" => "11",
            "title_ar" => "رقم الواتس اب",
            "title_en" => "Whatsapp",
            "type_id" => "1",
            "category" => "3",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "gmail",
            "setting_value" => "11",
            "title_ar" => "حساب الايميل",
            "title_en" => "Email",
            "type_id" => "1",
            "category" => "3",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "website_name_en",
            "setting_value" => "markatak",
            "title_ar" => "اسم الموقع",
            "title_en" => "Website Name",
            "type_id" => "1",
            "category" => "1",
            "order_by" => "1",
        ]);


        Setting::create([
            "setting_key" => "description_en",
            "setting_value" => "11",
            "title_ar" => " وصف الموقع ",
            "title_en" => " Website Description ",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);


        Setting::create([
            "setting_key" => "footer_description_en",
            "setting_value" => "test",
            "title_ar" => "وصف الفوتر ",
            "title_en" => "Footer Description",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);
    }
}
