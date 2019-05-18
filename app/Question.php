<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function course()
    {
        return $this->hasOne('App\Course');
    }
}
