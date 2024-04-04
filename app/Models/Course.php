<?php

namespace App\Models;

use App\Models\CourseDetail;
use App\Models\CourseLecture;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['language_id', 'image','course_duration','title','description','slug','price','level'];



    public function courseDetails()
    {
        return $this->hasOne(CourseDetail::class, 'topic_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function lectures()
    {
        return $this->hasMany(CourseLecture::class);
    }



}
