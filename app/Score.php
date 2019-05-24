<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function course()
    {
        return $this->hasOne('App\Course');
    }
}
