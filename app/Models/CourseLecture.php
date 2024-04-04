<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLecture extends Model
{
    use HasFactory;
    protected $fillable=[
        'course_id',
        'title',
        'description',
        'video_link',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
