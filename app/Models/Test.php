<?php

namespace App\Models;

use App\Models\User;
use App\Models\Language;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id','slug', 'languageid', 'title', 'description', 'level',
    'time_dur', 'pass_marks', 'total_marks', 'total_mcq'];

 

   public function questions()
   {
       return $this->hasMany(Question::class);
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function languages()
{
   return $this->belongsTo(Language::class, 'languageid');
}



public function attempts()
{
   return $this->hasMany(AttemptsTest::class);
}
}
