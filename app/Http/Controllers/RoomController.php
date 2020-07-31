<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\VerificationRoomRequest;
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
            ['description' => $request->description, 'secret' => Str::random(64), 'chat_secret' => Str::random(64)]
        );

        return redirect()->action('RoomController@join', ['secret' => $room->secret]);
    }

    public function join($secret) {
        $room = Room::with('users')->where('secret', $secret)->first();
        if (!$room) return redirect()->back();

        return view('rooms.room', compact('room'));
    }

    public function joinablePage() {
        return view('rooms.joinable');
    }

    public function verifyJoin(VerificationRoomRequest $request) {
        return redirect()->action('RoomController@join', ['secret' => $request->secret]);
    }

    public function joinChat($secret) {
        $room = Room::with('users')->where('chat_secret', $secret)->first();

        return view('rooms.chat', compact('room'));
    }

    public function roomStatus(Room $room) {
        $closed = $room->closed;
        $room->update(['closed' => !$closed]);

        return redirect()->route('room.index');
    }
}
