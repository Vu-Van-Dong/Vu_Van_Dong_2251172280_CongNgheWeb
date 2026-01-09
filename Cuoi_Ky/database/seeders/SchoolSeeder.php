<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Student;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        // Tạo 10 trường học
        School::factory(10)->create()->each(function ($school) {
            // Mỗi trường có 20 sinh viên
            Student::factory(20)->create([
                'school_id' => $school->id
            ]);
        });
    }
}
