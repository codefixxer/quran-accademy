<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'status'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship: A student has many enrolled courses
    public function studentCourses()
    {
        return $this->hasMany(Student::class, 'student_id');
    }

    // Relationship: A teacher teaches multiple courses
    public function taughtCourses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    // Fetch students (Users with role 'student')
    public static function getStudents()
    {
        return self::where('role', 'student')->get();
    }

    // Fetch teachers (Users with role 'teacher')
    public static function getTeachers()
    {
        return self::where('role', 'teacher')->get();
    }

    public function student()
{
    return $this->hasOne(Student::class);
}
}

?>
