<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseInterest extends Model
{
    public function course()
    {
        return $this->hasOne('App\Course', 'id', 'course_id');
    }

    public function interest()
    {
        return $this->hasOne('App\Interest', 'id', 'interest_id');
    }
}
