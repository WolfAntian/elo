<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'game_user')->withPivot('role', 'elo');
    }
}
