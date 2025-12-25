<?php

namespace Database\Seeders;

// use App\Models\User; // Không cần dòng này nữa vì ta không dùng User::factory ở đây
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    

        // Chỉ gọi Seeder tạo dữ liệu theo đề bài
        $this->call([
            UserPostSeeder::class,
        ]);
    }
}