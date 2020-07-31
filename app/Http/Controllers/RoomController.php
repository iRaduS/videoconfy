<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Room;
use Str;

class RoomController extends Controller
{
    public function index() {
        $rooms = auth()->user()->rooms;

        return view('rooms.index', compact('rooms'));
    }

    public function create(CreateRoomRequest $request) {
        $room = Room::firstOrCreate(
            ['name' => $request->name],
            ['description' => $request->description, 'secret' => Str::random(64)]
        );

        return redirect()->action('RoomController@join', ['secret' => $room->secret]);
    }

    public function join($secret) {
        $room = Room::with('users')->where('secret', $secret)->first();

        return view('rooms.room', compact('room'));
    }
}
