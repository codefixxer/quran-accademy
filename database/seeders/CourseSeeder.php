<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'Web Development',
                'price' => 150.00,
                'schedule' => '3',
                'image' => 'course_images/web-development.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Graphic Design',
                'price' => 120.00,
                'schedule' => '4',
                'image' => 'course_images/graphic-design.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital Marketing',
                'price' => 200.00,
                'schedule' => '5',
                'image' => 'course_images/digital-marketing.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
