<?php

namespace App\Models;

use App\Models\Test;
use App\Models\User;
use App\Models\Student_answers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttemptsTest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'test_id', 'marks_obtained']; // Add user_id to the fillable properties
    protected $hidden = ['user_id', 'test_id', 'marks_obtained'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Student_answers::class,'attempt_test_id'); // Corrected model name
    }
}
