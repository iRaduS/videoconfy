<?php

namespace App\Http\Middleware;

use Closure;
use App\Room;

class CheckIfRoomOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $room = Room::where('chat_secret', $request->route('secret'))->first();
        if (!$room) return redirect()->back();

        if ($room->closed) return redirect()->back();
        return $next($request);
    }
}
