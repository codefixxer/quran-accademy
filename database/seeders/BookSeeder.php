<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Advanced Mathematics',
            'course' => 'math',
            'file_path' => 'books/sample.pdf'
        ]);

        Book::create([
            'title' => 'Modern Science',
            'course' => 'science',
            'file_path' => 'books/sample.pdf'
        ]);
    }
}
