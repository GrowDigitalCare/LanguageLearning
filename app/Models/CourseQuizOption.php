<?php

namespace App\Models;

use App\Models\CourseQuizQuestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuizOption extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'optionA', 'optionB', 'optionC', 'optionD', 'correctOpt'];

    public function question()
    {
        return $this->belongsTo(CourseQuizQuestion::class);
    }

}
