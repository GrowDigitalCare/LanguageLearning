<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'slug',
        'image',

    ];

    public function language()
    {
        return $this->hasMany(Course::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
