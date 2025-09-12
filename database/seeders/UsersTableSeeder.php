<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'a@a',
                'password' => Hash::make('a'),
                'role' => 'admin',
                'status' => '1', // Active
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teacher User',
                'email' => 't@t',
                'password' => Hash::make('a'),
                'role' => 'teacher',
                'status' => '1', // Active
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student User',
                'email' => 's@s',
                'password' => Hash::make('a'),
                'role' => 'student',
                'status' => '1', // Active
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
