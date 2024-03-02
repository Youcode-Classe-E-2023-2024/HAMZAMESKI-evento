@include('layout.header')

<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
        <section class="flex w-full h-full">
            <!-- Sidebar -->
            @include('layout.side-bar')

            <!-- container -->
            <main class="h-screen w-full overflow-auto" style="background-image: url('http://127.0.0.1:8000/storage/images/landingpageimage.jpg');">
                @include('layout.success')
                @yield('content')
            </main>

        </section>

    </div>
</div>
@include('layout.footer')
@include('js-script.script')
