<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('page_title', 128);
            $table->text('page_content');
            $table->string('image', 256)->nullable();
            $table->integer('page_number');
            $table->timestamps();
    
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_pages');
    }
};
