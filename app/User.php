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

    public function rewards()
    {
        return $this->hasMany('App\Reward');
    }

    public function purchases()
    {
        return $this->hasManyThrough(
            'App\Purchase', 'App\Reward',
            'user_id', 'reward_id', 'id'
        );
    }

}
