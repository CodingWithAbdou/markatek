<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            "title_ar" => "عنوان البنر الاول",
            // "title_en" => "Banner 1",
            // "description_en" => "Banner 1 Description",
            "description_ar" => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص",
            "image_path" => "https://placehold.co/1920x1080/cecece/fff",
            "order_by" => "1",
        ]);

        Banner::create([
            "title_ar" => "عنوان البنر الثاني",
            // "title_en" => "بنر 2",
            "description_ar" => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص",
            // "description_en" => "Banner 2 Description",
            "image_path" => "https://placehold.co/1920x1080/cecece/fff",
            "order_by" => "1",
        ]);
    }
}
