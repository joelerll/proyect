<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExtraInfo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bank_accounts()
    {
        return $this->hasMany('App\UserBankInfo');
    }
}
