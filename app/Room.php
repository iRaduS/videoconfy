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
        'name', 'description', 'secret',
    ];

    public function users() {
        return $this->belongsToMany('App\User')->using('App\RoomUser');
    }

    public function isUserInsideRoom($userID) {
        $collection = Cache::remember('users_room', 120, function () {
            return $this->users();
        });

        $collection->filter(function ($value) {
            return $value->id === $userID;
        });

        return count($collection->all()) ? true : false;
    }
}
