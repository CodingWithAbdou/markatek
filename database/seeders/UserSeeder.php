<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'abdou',
            'email' => 'admin@admin.com',
            "image" => "assets/images/user_image.jpg",
            'password' => bcrypt('123456')
        ]);
    }
}
