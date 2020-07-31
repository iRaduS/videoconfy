@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="code-card">
				<div class="text-center mb-5">
					<h2 class="m-0">Join a meeting</h2>
					<p>Join to a conference by entering its name!</p>
				</div>
				<form class="auth-form" method="POST" action="{{ route('room.verify.join') }}">
                    @csrf
					<input type="text" class="form-control code-input @error('secret') is-invalid @enderror" id="secret" name="secret" placeholder="Enter Room Secret" />
					@error('secret')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            
                    <button class="btn w-100 btn-code" type="submit">Join Room</button>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<img src="{{ asset('images/videochat.svg') }}" />
		</div>
	</div>
</div>
@endsection