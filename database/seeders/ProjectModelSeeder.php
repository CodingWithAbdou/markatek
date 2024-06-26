<?php

namespace Database\Seeders;

use App\Models\ProjectModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ProjectModel::create([
            'parent_id' => '3',
            'route_key' => 'users',
            'title_ar' => 'المستخدمين',
            'title_en' => 'Users',
            "is_menu" => '1',
            "icon" =>  'fas fa-users',
            "order_by" => '1'
        ]);
        ProjectModel::create([
            'parent_id' => '3',
            'route_key' => 'settings',
            'title_ar' => 'الإعدادات',
            'title_en' => 'Settings',
            "is_menu" => '1',
            "icon" =>  'fas fa-cogs',
            "order_by" => '3'
        ]);
        ProjectModel::create([
            'parent_id' => '0',
            'title_ar' => 'النظام',
            'title_en' => 'System',
            "is_menu" => '1',
            "icon" =>  'fas fa-users-cog',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'banners',
            'title_ar' => 'البنرات',
            'title_en' => 'Banners',
            'model' => 'Banner',
            'model_name' => 'App\Models\Banner',
            "is_menu" => '1',
            "icon" =>  'fa fa-image',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'categories',
            'model' => 'Category',
            'model_name' => 'App\Models\Category',
            'title_ar' => 'التصنيفات',
            'title_en' => 'Categories',
            "is_menu" => '1',
            "icon" =>  'fa fa-bars',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'products',
            'title_ar' => 'المنتجات',
            'title_en' => 'Products',
            'model' => 'Product',
            'model_name' => 'App\Models\Product',
            "is_menu" => '1',
            "icon" =>  'fa fa-cubes',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'places',
            'model' => 'Place',
            'model_name' => 'App\Models\Place',
            'title_ar' => 'المناطق',
            'title_en' => 'Places',
            "is_menu" => '1',
            "icon" =>  'fa fa-map-signs',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'coupons',
            'title_ar' => 'الكوبونات',
            'title_en' => 'Coupons',
            "is_menu" => '1',
            "icon" =>  'fa fa-plus-square',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'orders',
            'title_ar' => 'الطلبات',
            'title_en' => 'Orders',
            "is_menu" => '1',
            "icon" =>  'fa fa-shopping-basket',
            "order_by" => '1'
        ]);
    }
}
