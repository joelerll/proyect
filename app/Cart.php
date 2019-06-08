<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function billing()
    {
        return $this->hasOne('App\Billing');
    }

    public function cart_items()
    {
        return $this->hasMany('App\CartItem')->with('course');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
