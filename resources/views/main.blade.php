@extends('layout.layout')
@section('content')
    <style>
        .SCALE:hover {
            transform: scale(1.04);
            transition: all 0.5s;
        }
        .SCALE {
            background-color: rgba(0, 0, 0, 0.53);
            backdrop-filter: blur(1px);
        }
    </style>
    <section class="h-full py-6 sm:py-12 dark:text-gray-100">
        <div class="container p-6 mx-auto space-y-8">
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach($events as $event)
                    <article class="flex flex-col border-1 border-solid border-gray-500 SCALE">
                        <div rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
                            <img  alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="http://127.0.0.1:8000/storage/images/{{ $event->image }}">
                        </div>
                        <div class="flex flex-col flex-1 p-6">
                            <div rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></div>
                            <a rel="#" href="{{ route('event-details', $event->id) }}" class="text-xs tracki uppercase hover:underline dark:text-violet-400">details</a>
                            <h3 class="flex-1 py-2 text-lg font-semibold leadi">{{ substr($event->name, 0, 20) }}</h3>
                            <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                                <span>{{ $event->date }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
{{--bg-[#161513]--}}
