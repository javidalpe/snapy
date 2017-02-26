<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function reward()
    {
        return $this->belongsTo('App\Reward');
    }
}
