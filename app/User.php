<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }



    public function photos()
    {
        return $this->belongsTo('App\Photo', 'photo', 'id');
    }

    public function isAdmin()
    {
        //is authenticated?
        if($this->role->name == 'administrator')
        {
            return true;
        }
        else
        {
            return false;
        }

        //is role = admin
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])))."d=mm&s=";
        return "http://www.gravatar.com/avatar/$hash";

    }
}
