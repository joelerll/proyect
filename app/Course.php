<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\User');
    }
}
