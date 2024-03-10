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
{{--    <div class="flex items-center justify-between p-2" style="position: fixed; right: 0;">--}}
{{--        <div></div>--}}
{{--        <a href="{{ route('my-reserved-events') }}" class="underline text-white">--}}
{{--            my reserved events--}}
{{--        </a>--}}
{{--    </div>--}}
    <main class="h-full w-full flex">
        <section class="flex-grow h-full sm:py-12 dark:text-gray-100 mr-[100px]">
            <div class="container px-6 mx-auto space-y-8">
                <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-3">
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
                    {{ $events->links() }}
                </div>
            </div>
        </section>

        <section class="fixed top-0 right-0 bottom-0 bg-black" style="border-left: solid gray 0.1px">
            <p class="font-bold text-white bg-black p-2 px-4 border-b-[1px] border-solid border-pink-500">
                categories
            </p>
            </p>
            <div class="h-[94%] w-full overflow-auto flex flex-col" style="background-color: black;">
                <a href="{{ route('main') }}" class="px-4 py-1 text-gray-300 hover:bg-pink-500 hover:text-black {{ $category_hover == 'All'? 'bg-pink-600': '' }}">All</a>
                @foreach($categories as $category)
                    <a href="{{ route('category-events', $category->id) }}" class="px-4 py-1 text-gray-300 hover:bg-pink-500 hover:text-black {{ $category_hover == $category->name? 'bg-pink-600': '' }}"> {{ $category->name }}</a>
                @endforeach
            </div>
        </section>
    </main>

@endsection
