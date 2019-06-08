<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountItem extends Model
{
    public function course()
    {
        return $this->hasOne('App\Course');
    }

    public function discount()
    {
        return $this->hasOne('App\Discount');
    }
}
