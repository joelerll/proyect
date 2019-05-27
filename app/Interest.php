<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function user()
    {
        return $this->belongsToMany('App\User', 'interest_users', 'interest_id ', 'user_id');
    }
}
