<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    // Define which attributes are mass assignable
    protected $fillable = ['course_name', 'course_description', 'user_id'];

public function pages()
{
    return $this->hasMany(CoursePage::class);
}

}

