<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Database\Eloquent\Model;
use App\UsersType;

class User extends Model implements JWTSubject, AuthContract
{
    use Notifiable, Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // public function type()
    // {
    //     return $this->belongsTo('App\UsersType', 'users_types_id', 'id');
    // }

    public function user_type() {
        return  UsersType::where('id',$this->users_types_id)->first();
        // return !is_null($this->type()->where('users_types_id', $user->users_types_id)->first());
    }

    public function getJWTCustomClaims()
    {
        return [
            'names' => $this->names,
            'email'=> $this->email,
            'type' => $this->user_type()->type
        ];
    }
}
