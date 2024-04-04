<?php

namespace App\Models;

use App\Models\CourseLecture;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTest extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'user_id', 'lecture_id', 'title', 'description',
    'time_dur', 'pass_marks', 'total_marks', 'total_mcq'];

    public function lectures()
{
    return $this->belongsTo(CourseLecture::class, 'lecture_id');
}

// public function competitionquestions()
// {
//     return $this->hasMany(CompetitionQuestion::class, 'test_id');
// }

public function course()
{
   return $this->belongsTo(Course::class);
}


}
