<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBankInfo extends Model
{
    public function user()
    {
        return $this->hasOne('App\UserExtraInfo');
    }
}
