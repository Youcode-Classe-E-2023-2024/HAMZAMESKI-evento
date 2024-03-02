@extends('shared.layout')

@section('content')
    <div class="max-h-screen relative flex flex-col-reverse py-16 lg:pt-0 lg:flex-col lg:pb-0">
        <div class="inset-y-0 top-0 right-0 z-0 w-full max-w-xl px-4 mx-auto md:px-0 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-7/12 lg:max-w-full lg:absolute xl:px-0">
            <svg class="absolute left-0 hidden h-full text-white transform -translate-x-1/2 lg:block" viewBox="0 0 100 100" fill="currentColor" preserveAspectRatio="none slice">
                <path d="M50 0H100L50 100H0L50 0Z"></path>
            </svg>
            <img
                class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full"
                src="http://127.0.0.1:8000/storage/images/landingpage.jpg"
                alt=""
            />
        </div>
        <div class="relative flex  flex-col items-start w-full max-w-xl px-4 mx-auto md:px-0 lg:px-8 lg:max-w-screen-xl">
            <div class="mb-16 lg:my-40 lg:max-w-lg lg:pr-5">
                <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                    EVENTO
                </p>
                <h2 class="mb-5 font-sans text-6xl  font-bold tracking-tight text-gray-900 sm:leading-none">
                    Everything you<br class="hidden md:block" />
                    can imagine
                    <span class="inline-block text-deep-purple-accent-400">is real</span>
                </h2>
                <p class="pr-5 mb-5 text-base text-gray-700 md:text-lg">
                    Evento is revolutionizing the way you discover and manage event tickets. Whether you're a participant seeking exciting experiences or an organizer aiming to host unforgettable events.
                </p>
                <div class="flex items-center">
                    <a
                        href="/"
                        class="inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-black hover:bg-red-500 focus:shadow-outline focus:outline-none"
                    >
                        Register
                    </a>
                    <a href="/" aria-label="" class="inline-flex items-center justify-center h-12 px-6 gap-1 border border-solid border-black rounded font-semibold text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-700 transition duration-200 hover:bg-red-500 hover:text-white">
                        <span>
                            Login
                        </span>
                        <ion-icon class="text-xl" name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
