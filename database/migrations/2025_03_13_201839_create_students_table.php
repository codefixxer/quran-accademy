<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   // Migration file (students table)
public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Keep this
        $table->time('start_time')->nullable();
        $table->time('end_time')->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
