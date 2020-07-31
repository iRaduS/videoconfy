<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Conversation;
use App\Events\NewMessage;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeMessage(Request $request)
    {
        $conversation = Conversation::create([
            'message' => $request->message,
            'room_id' => $request->room_id,
            'user_id' => auth()->user()->id
        ]);

        broadcast(new NewMessage($conversation))->toOthers();
        return $conversation->load('user');
    }
}
