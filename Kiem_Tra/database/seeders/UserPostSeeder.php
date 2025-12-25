<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserPostSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // 1. Tạo 10 người dùng
        for ($i = 0; $i < 10; $i++) {
            $userId = DB::table('users')->insertGetId([
                'username' => $faker->unique()->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123456'),
                'fullname' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2. Mỗi người dùng viết khoảng 10 bài (Tổng ~100 bài)
            for ($j = 0; $j < 10; $j++) {
                DB::table('posts')->insert([
                    'user_id' => $userId,
                    'title' => $faker->sentence,
                    'content' => $faker->paragraph(5), // Nội dung dài hơn
                    'category' => $faker->randomElement(['Technology', 'Lifestyle', 'Travel']),
                    'views' => $faker->numberBetween(10, 1000),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}