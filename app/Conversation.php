<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public $fillable = [
        'message', 'room_id', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function room() {
        return $this->belongsTo('App\Room');
    }
}
