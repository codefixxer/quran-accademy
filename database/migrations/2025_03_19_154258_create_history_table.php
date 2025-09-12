<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) { // ✅ Using 'history' instead of 'histories'
            $table->id();
            $table->integer('user_id')->nullable(); // ✅ Corrected nullable usage
            $table->text('description');
            $table->string('file')->nullable(); // ✅ Made file nullable
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
