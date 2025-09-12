<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'teacher_id', 'course_id', 'start_time', 'end_time'];


    // Relationship with User (if students are users)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
 
     
    // Relationship with Teacher (assuming teachers are also stored in the users table)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
 
}
 