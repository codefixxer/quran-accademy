<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books'; // Ensure correct table name

    protected $primaryKey = 'book_id'; // Set correct primary key

    public $incrementing = true; // Ensure auto-increment is enabled
    protected $fillable = ['title', 'author','file_path', 'file', 'size','course_id'];

    // Add this relationship
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

   
    
}