<?php

namespace App;

use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


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
    public function getNameFriendship(Model $recipient)
    {
        $user = Auth::user();
        if($user->isFriendWith($recipient))
            return "Friend";
        elseif($user->hasFriendRequestFrom($recipient))
            return "No friend";
        elseif($recipient->hasFriendRequestFrom($user))
            return "No friend";
        elseif($user->hasBlocked($recipient))
            return "No friend block";
        elseif($recipient->hasBlocked($user))
            return "No friend";
        else
            return "No friend";
    }
    use Friendable;
}
