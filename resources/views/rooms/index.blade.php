@extends('layouts.app')

@section('content')
<div class="room-section">
    <div class="row no-gutters" style="height: 100vh;">
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
            <div class="container text-center">
                <form method="POST" action="{{ route('room.create') }}">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">{{ __('Description') }}</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create new room') }}
                            </button>
                        </div>
                    </div>
                </form>

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
                                    <a href="{{ route('room.join', ['secret' => $room->secret]) }}" class="btn btn-primary">Join</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-6 photo-section"></div>
    </div>
</div>
@endsection
