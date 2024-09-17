<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Specify the table associated with the model (if different from the plural form of the model name)
    // protected $table = 'courses';

    // Define which attributes are mass assignable
    protected $fillable = ['course_name', 'course_description', 'user_id'];
    // Define the relationship with CoursePage
    // In Course.php (Model)
public function pages()
{
    return $this->hasMany(CoursePage::class);
}

}

