<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DepartmentEmployeeSeeder extends Seeder
{
    public function run()
    {
        // Khởi tạo đối tượng Faker
        $faker = Faker::create();

        // 1. Tạo 5 phòng ban [cite: 17]
        for ($i = 0; $i < 5; $i++) {
            // Insert dữ liệu vào bảng departments và lấy về ID vừa tạo
            $departmentId = DB::table('departments')->insertGetId([
                'name' => $faker->company,         // Tên công ty/phòng ban
                'location' => $faker->address,     // Địa chỉ
                'manager' => $faker->name,         // Tên người quản lý
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2. Với mỗi phòng ban, tạo 5-8 nhân viên 
            $limit = $faker->numberBetween(5, 8); // Random số lượng nhân viên

            for ($j = 0; $j < $limit; $j++) {
                DB::table('employees')->insert([
                    'department_id' => $departmentId, // Lấy ID phòng ban ở trên
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail, // Email không trùng lặp [cite: 11]
                    'phone' => $faker->phoneNumber,
                    // Chọn ngẫu nhiên 1 trong 3 chức vụ [cite: 11]
                    'position' => $faker->randomElement(['VP', 'Manager', 'Staff']),
                    'salary' => $faker->randomFloat(2, 1000, 5000), // Lương ngẫu nhiên
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}