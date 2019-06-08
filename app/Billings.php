<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billings extends Model
{
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
