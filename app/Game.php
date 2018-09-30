<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function getUpdatesAttribute()
    {
        return Update::orderBy('id desc')->where('game_id', '=', $this->id)->get();
    }
}
