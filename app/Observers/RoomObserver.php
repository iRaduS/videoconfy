<?php

namespace App\Observers;

use App\Room;

class RoomObserver
{
    public function created(Room $room) {
        $user = auth()->user();
        $room->users()->attach($user, ['organiser_id' => $user->id]);
    }
}
