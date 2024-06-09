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
            "is_menu" => '1',
            "icon" =>  'fas fa-users',
            "order_by" => '1'
        ]);
        ProjectModel::create([
            'parent_id' => '3',
            'route_key' => 'settings',
            'title_ar' => 'الإعدادات',
            "is_menu" => '1',
            "icon" =>  'fas fa-cogs',
            "order_by" => '3'
        ]);
        ProjectModel::create([
            'parent_id' => '0',
            'title_ar' => 'النظام',
            "is_menu" => '1',
            "icon" =>  'fas fa-users-cog',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'categories',
            'title_ar' => 'التصنيفات',
            "is_menu" => '1',
            "icon" =>  'fa fa-bars',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'products',
            'title_ar' => 'المنتجات',
            "is_menu" => '1',
            "icon" =>  'fa fa-cubes',
            "order_by" => '1'
        ]);

        ProjectModel::create([
            'parent_id' => '0',
            'route_key' => 'places',
            'title_ar' => 'المناطق',
            "is_menu" => '1',
            "icon" =>  'fa fa-map-signs',
            "order_by" => '1'
        ]);
    }
}
