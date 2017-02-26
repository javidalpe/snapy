<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'description',
        'amount'
    ];

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
