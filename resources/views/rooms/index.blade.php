@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="code-card">
				<div class="text-center mb-5">
					<h2 class="m-0">Create a meeting</h2>
					<p>Create a conference by entering its name and description!</p>
				</div>
                <form method="POST" action="{{ route('room.create') }}">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="name">{{ __('Name for your room') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">{{ __('A small description for your room') }}</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-code w-100">
                                {{ __('Create new room') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
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
                            <td class="d-flex">
                                <a href="{{ route('room.join', ['secret' => $room->secret]) }}" class="mr-1 btn btn-primary">Join</a>
                                <a href="{{ route('room.open', ['room' => $room->id]) }}" class="mr-1 btn btn-primary">{{ $room->closed ? 'Open chat' : 'Close chat' }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
