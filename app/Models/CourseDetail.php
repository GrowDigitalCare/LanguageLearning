<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    use HasFactory;

    protected $fillable = ['language_id', 'course_id', 'course_description', 'what_you_will_learn', 'certification_description',  'image',  'instructor_id'];


    public function language()
    {
        return $this->belongsTo(Language::class);
    }
  public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}


    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }



    public function lectures()
{
    return $this->hasMany(CourseLecture::class, 'course_id');
}


}
