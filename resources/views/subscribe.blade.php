@extends('layout.layout')
@section('content')

    <section class="h-full relative bg-[#161513]">
        <div class="mx-auto md:px-6">
            <section class="text-center lg:text-left">
                <div class="py-12 md:px-12">
                    <div class="container mx-auto xl:px-32">
                        <div class="grid items-center lg:grid-cols-2">
                            <div class="mb-12 md:mt-12 lg:mt-0 lg:mb-0">
                                <div
                                    class="relative z-[1] block rounded-lg bg-[hsla(0,0%,100%,0.55)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] backdrop-blur-[25px] dark:bg-[hsla(0,0%,5%,0.55)] dark:shadow-black/20 md:px-12 lg:-mr-14">
                                    <h1 class="mt-0 mb-12 text-4xl text-white font-bold tracking-tight md:text-5xl xl:text-6xl">
                                        Are you ready <br /><span class="text-pink-500 dark:text-danger-400">for an adventure?</span>
                                    </h1>
                                    <div class="mb-6 flex-row md:mb-0 md:flex">
                                        <div class="relative mb-3 w-full md:mr-3 md:mb-0" data-te-input-wrapper-init>
                                            <input type="text"
                                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                   id="exampleFormControlInput2" placeholder="Enter your email" />
                                            <label for="exampleFormControlInput2"
                                                   class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Enter
                                                your email
                                            </label>
                                        </div>
                                        <button type="submit"
                                                class="inline-block rounded bg-pink-500 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                data-te-ripple-init data-te-ripple-color="light">
                                            Subscribe
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="md:mb-12 lg:mb-0 ">
                                <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/056.jpg"
                                     class="rotate-lg-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: Design Block -->
        </div>
    </section>

@endsection
