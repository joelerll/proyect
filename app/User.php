<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Database\Eloquent\Model;
use App\UserType;

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
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'restore_token_date_limit' => 'timestamp',
    ];

    // jwt config
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'names' => $this->names,
            'email'=> $this->email,
            'type' => $this->user_type()->type
        ];
    }

    // custom
    public function user_type() {
        return  UserType::where('id',$this->user_type_id)->first();
    }

    // relations
    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_user');
    }

    public function course_user()
    {
        return $this->hasMany('App\CourseUser');
    }

    public function bank()
    {
        return $this->belongsTo('App\UserBankInfo');
    }

    public function answers()
    {
        return $this->morphMany('App\Answer');
    }

    public function extra_info()
    {
        return $this->hasOne('App\UserExtraInfo');
    }

    public function interest()
    {
        return $this->belongsToMany('App\Interest', 'interest_users', 'user_id', 'interest_id');
    }
}

