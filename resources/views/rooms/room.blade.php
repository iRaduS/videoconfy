@extends('layouts.app')

@section('content')
<video-component :room="{{ $room }}"></video-component>
<chat-component :room="{{ $room }}"></chat-component>
@endsection
