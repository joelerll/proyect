<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function billing()
    {
        return $this->hasOne('App\Billing');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
