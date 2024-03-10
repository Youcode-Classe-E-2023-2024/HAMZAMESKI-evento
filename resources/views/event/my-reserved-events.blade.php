@extends('layout.layout')
@section('content')
    <ul>
        @foreach(auth()->user()->reservedEvents as $event)
            <li class="text-white">{{ $event->name }}</li>
        @endforeach
    </ul>
@endsection
