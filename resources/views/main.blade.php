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

    <div class="fixed z-2 top-[20px] left-[400px]">
        <div class="relative text-gray-600 focus-within:text-gray-400">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </span>
            <input id="searchInput" type="search" name="q" class="py-2 text-sm text-black bg-gray-900 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900 border-[1px] border-solid border-gray-300" placeholder="Search..." autocomplete="off">
        </div>

    </div>
    <main class="h-full w-full flex mt-16">
        <section class="flex-grow h-full sm:py-12 dark:text-gray-100 mr-[100px]">
            <div class="container px-6 mx-auto space-y-8">
                <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-3">
                    @forelse($events as $event)
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
                    @empty
                        <div class="h-[80vh] w-full flex items-center justify-center" style="grid-column: 1 / -1; grid-row: 1 / -1;">
                            <h1 class="text-3xl">
                                NO EVENT FOUND IN THAT'S PAGE
                            </h1>
                        </div>
                    @endforelse
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
                <a href="{{ route('main') }}" class="px-4 py-1 text-gray-300 hover:bg-pink-500 {{ $category_hover == 'All'? 'bg-pink-600': '' }}">All</a>
                @foreach($categories as $category)
                    <a href="{{ route('category-events', $category->id) }}" class="px-4 py-1 text-gray-300 hover:bg-pink-500 {{ $category_hover == $category->name? 'bg-pink-600': '' }}"> {{ $category->name }}</a>
                @endforeach
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const articles = document.querySelectorAll(".SCALE");

            searchInput.addEventListener("input", function() {
                const searchText = searchInput.value.toLowerCase();

                articles.forEach(article => {
                    const articleName = article.querySelector("h3").textContent.toLowerCase();

                    if (articleName.includes(searchText)) {
                        article.style.display = "block";
                    } else {
                        article.style.display = "none";
                    }
                });
            });
        });
    </script>


@endsection
