<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentCourse extends Model
{
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
