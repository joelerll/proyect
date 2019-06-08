<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public function courses()
    {
        return $this->hasOne('App\CourseDiscount');
    }
}
