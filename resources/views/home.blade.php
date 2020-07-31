@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($rooms))
    <div class="table-responsive my-5">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr class="bg-light">
                    <th scope="row">{{ $room->id }}</th>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->description }}</td>
                    <td>
                        <a href="{{ route('room.chat', ['secret' => $room->chat_secret]) }}" class="mr-1 btn btn-primary">Join CHAT</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center mb-4">
        <div class="alert alert-danger">
            We can't find any free room, in order to join the chat.
        </div>
    </div>
    @endif
</div>
@endsection
