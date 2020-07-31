@extends('layouts.app')

@section('content')
<chat-component :room="{{ $room }}"></chat-component>
@endsection