@extends('layout.layout')
@section('content')
    <ul>
        @foreach(auth()->user()->events as $event)
            <li>{{ $event->name }}</li>
        @endforeach
    </ul>

@endsection
