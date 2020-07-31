<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'secret', 'closed', 'chat_secret'
    ];

    public function users() {
        return $this->belongsToMany('App\User')->using('App\RoomUser');
    }
}
