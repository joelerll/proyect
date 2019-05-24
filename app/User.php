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
        'name', 'email', 'password', 'restore_token',
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

    public function courses()
    {
        // return $this->belongsToMany('App\Course', 'course_users', 'courses_id', 'users_id');
        return $this->belongsToMany('App\Course', 'course_user');
    }

    public function course_user()
    {
        return $this->hasMany('App\CourseUser');
    }

    public function answers()
    {
        return $this->morphMany('App\Answer');
    }
}

