@extends('layout.layout')
@section('content')
    <section class="backdrop-blur-sm shadow-md h-full py-6 sm:py-12 dark:text-gray-100" style="background-color: rgba(0, 0, 0, 0.403);">
        <div class="container p-6 mx-auto space-y-8">
            <div class="space-y-2 text-center">
                <h2 class="text-3xl font-bold">Events</h2>
                <p class="font-serif text-sm dark:text-gray-400">Informations</p>
            </div>
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach($events as $event)
                    <article class="flex flex-col dark:bg-gray-900 border-1 border-solid border-purple-500">
                        <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
                            <img  alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="http://127.0.0.1:8000/storage/images/{{ $event->image }}">
                        </a>
                        <div class="flex flex-col flex-1 p-6">
                            <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
                            <a rel="noopener noreferrer" href="#" class="text-xs tracki uppercase hover:underline dark:text-violet-400">{{ substr($event->description, 0, 40) }}</a>
                            <h3 class="flex-1 py-2 text-lg font-semibold leadi">{{ substr($event->name, 0, 20) }}</h3>
                            <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                                <span>{{ substr($event->created_at, 0, 20) }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
{{--bg-[#161513]--}}
