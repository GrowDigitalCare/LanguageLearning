<?php

namespace App\Models;

use App\Models\CourseQuizOption;
use App\Models\CourseTest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'audio','marks'];

    public function tests()
    {
        return $this->belongsTo(CourseTest::class);
    }

    public function options()
    {
        return $this->hasMany(CourseQuizOption::class,'question_id');
    }


}
