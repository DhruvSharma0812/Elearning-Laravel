<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural of the model name
    protected $table = 'pages'; 

    // Define the fillable attributes
    protected $fillable = ['page_title', 'page_content', 'image', 'course_id', 'page_number'];
    
    // Define relationships if needed
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
