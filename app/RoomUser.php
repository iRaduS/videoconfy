<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoomUser extends Pivot
{
    public function organiser() {
        return $this->belongsTo('App\User', 'organiser_id');
    }
}
