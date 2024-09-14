<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'page_title', 'page_content', 'image', 'page_number'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
