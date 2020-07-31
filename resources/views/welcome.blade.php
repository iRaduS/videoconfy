@extends('layouts.app')

@section('content')
    <section class="welcome-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <h1>Fantastic video meetings for everyone!</h1>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-meet text-white" role="button" href="{{ route('room.index') }}">Start meeting</a>
                            <a class="btn btn-join text-white" role="button" href="{{ route('room.index') }}">Join a meeting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="covid-section">
        <div class="row">
            <div class="col">
                <h4>Responding to the Coronavirus</h4>
                <p class="m-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore<br></p>
            </div>
        </div>
    </section>
@endsection
