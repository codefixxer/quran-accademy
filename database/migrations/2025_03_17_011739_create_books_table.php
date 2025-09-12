<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id'); // Auto-increment primary key
            $table->string('title');
            $table->unsignedBigInteger('course_id'); // Foreign key referencing courses.id
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
