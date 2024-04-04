<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


}
