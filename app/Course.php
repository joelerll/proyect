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

    public function cart_items()
    {
        return $this->hasMany('App\CartItem');
    }

    public function content()
    {
        return $this->hasMany('App\ContentCourse');
    }

    public function discount()
    {
        return $this->hasMany('App\CourseDiscount');
    }
}
