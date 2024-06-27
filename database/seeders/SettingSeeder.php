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
            "setting_key" => "website_name_en",
            "setting_value" => "markatak",
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
            "setting_key" => "description_en",
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
            "setting_key" => "footer_description_en",
            "setting_value" => "test",
            "title_ar" => "وصف الفوتر ",
            "title_en" => "Footer Description",
            "type_id" => "3",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "terms_ar",
            "setting_value" => "test",
            "title_ar" => "الشروط والأحكام",
            "title_en" => "Terms and Conditions",
            "type_id" => "5",
            "category" => "1",
            "order_by" => "1",
        ]);
        Setting::create([
            "setting_key" => "terms_en",
            "setting_value" => "test",
            "title_ar" => "الشروط والأحكام",
            "title_en" => "Terms and Conditions",
            "type_id" => "5",
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
            "setting_key" => "payment_url",
            "setting_value" => "https://apitest.myfatoorah.com/",
            "title_ar" => "رابط بوابة الدفع",
            "title_en" => "Payment Gateway URL",
            "type_id" => "1",
            "category" => "2",
            "order_by" => "1",
        ]);

        Setting::create([
            "setting_key" => "api_key",
            "setting_value" => "rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL",
            "title_ar" => "مفتاح ال API",
            "title_en" => "API Key",
            "type_id" => "3",
            "category" => "2",
            "order_by" => "1",
        ]);

        Setting::create([
            "setting_key" => "dir_production",
            "setting_value" => "1",
            "title_ar" => "إتجاه المنتجات",
            "title_en" => "Products Direction",
            "type_id" => "5",
            "category" => "4",
            "order_by" => "1",
        ]);

        Setting::create([
            "setting_key" => "dir_category",
            "setting_value" => "1",
            "title_ar" => "إتجاه التصنيفات",
            "title_en" => "Category Direction",
            "type_id" => "6",
            "category" => "4",
            "order_by" => "1",
        ]);

        Setting::create([
            "setting_key" => "color_site",
            "setting_value" => "13 148 136",
            "title_ar" => "لون الموقع",
            "title_en" => "Site Color",
            "type_id" => "7",
            "category" => "4",
            "order_by" => "1",
        ]);
    }
}
