<?php

namespace App;

use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function books(){
        return $this->belongsToMany('App\Book');
    }
    public function reviews(){
        return $this->hasMany('App\Review');
    }
    public function marks(){
        return $this->hasMany('App\Mark');
    }
    use Friendable;
}
