@extends('layout.layout')
@section('content')

    <section class="h-full relative bg-[#161513] py-4">
        <div class="container mx-auto xl:px-32">
            <div class="grid items-center lg:grid-cols-2">
                <div class="mb-12 md:mt-12 lg:mt-0 lg:mb-0">
                    <div
                        class="relative z-[1] border-[1px] border-solid border-gray-600 block rounded-lg bg-[hsla(0,0%,100%,0.55)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] backdrop-blur-[25px] dark:bg-[hsla(0,0%,5%,0.55)] dark:shadow-black/20 md:px-12 lg:-mr-14">
                        <h1 class="mt-0 mb-12 text-4xl text-white font-bold tracking-tight md:text-5xl xl:text-6xl">
                            Be an Organizer <br /><span class="text-pink-500 dark:text-danger-400">& enjoy adventure?</span>
                        </h1>
                        @if(auth()->user()->hasRole('denied_for_user'))
                            <div class="mb-6 flex-row md:mb-0 md:flex">
                                <div
                                    class="inline-block border-[1px] border-solid border-orange-500 bg-orange-500 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light">
                                    ⏳
                                </div>
                                <div class="flex items-center justify-center px-4 border-t-[1px] border-b-[1px] border-r-[1px] border-solid border-orange-500">
                                    <p class="text-gray-400">
                                        Your organizer role is handling by admin
                                    </p>
                                </div>
                            </div>
                        @elseif(!auth()->user()->hasRole('organizer_lvl4'))
                            <form action="{{ route('subscribe.store') }}" method="POST" class="mb-6 flex-row md:mb-0 md:flex">
                                @csrf
                                <button type="submit"
                                        class="inline-block border-[1px] border-solid border-pink-500 bg-pink-500 hover:bg-pink-600 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                        data-te-ripple-init data-te-ripple-color="light">
                                    Subscribe
                                </button>
                                <div class="flex items-center justify-center px-4 border-t-[1px] border-b-[1px] border-r-[1px] border-solid border-pink-500">
                                    <p class="text-gray-400">
                                        Your are not an organizer yet!
                                    </p>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('unsubscribe') }}" method="POST" class="mb-6 flex-row md:mb-0 md:flex">
                                @csrf
                                <button type="submit"
                                        class="inline-block border-[1px] border-solid border-red-500 bg-red-500 hover:bg-red-600 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                        data-te-ripple-init data-te-ripple-color="light">
                                    unsubscribe
                                </button>
                                <div class="flex items-center justify-center px-4 border-t-[1px] border-b-[1px] border-r-[1px] border-solid border-red-500">
                                    <p class="text-gray-400">
                                        Your are an Organizer Now
                                    </p>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="h-full">
                    <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/056.jpg"
                         class="rotate-lg-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="" />
                </div>
            </div>
        </div>
    </section>

@endsection
