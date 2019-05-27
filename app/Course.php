<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Score;

class Course extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'course_user');
    }

    public function course_user()
    {
        return $this->hasMany('App\CourseUser');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function interest()
    {
        return $this->belongsToMany('App\Interest');
    }
}
