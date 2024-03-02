<div class="h-screen flex flex-col w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                </div>
            </li>

            <li>
                <a href="{{ route('main') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Home</span>
                </a>
            </li>

            @auth()

                @if(auth()->user()->hasRole('admin'))
                    <li>
                        <a href="{{ route('admin.show') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <ion-icon name="eye-outline" class="text-2xl"></ion-icon>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Admin Dash</span>
                        </a>
                    </li>
                @endif

                {{-- can handle the templates --}}
                @if(auth()->user()->hasPermissionTo('create template'))
                    <li>
                        <form action="{{ route('templates.manage-template') }}">
                            @csrf
                            <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                              <ion-icon name="layers-outline" class="text-2xl"></ion-icon>
                            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Manage Templates</span>
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('mytemplates', 1) }}">
                            @csrf
                            <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                              <ion-icon name="receipt-outline" class="text-2xl"></ion-icon>
                            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">My Templates</span>
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('deletedTemplates') }}">
                            @csrf
                            <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                              <ion-icon name="trash-outline" class="text-2xl"></ion-icon>
                            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Deleted Templates</span>
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('images.show') }}">
                            @csrf
                            <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                              <ion-icon name="flower-outline" class="text-2xl"></ion-icon>
                            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Explore Medias</span>
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('imageForm') }}">
                            @csrf
                            <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                          <ion-icon name="image-outline" class="text-2xl"></ion-icon>
                        </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Upload Images</span>
                            </button>
                        </form>
                    </li>
                @endif

                @if(auth()->user()->hasPermissionTo('handle video'))
                    <li>
                        <form action="{{ route('videoForm') }}">
                            @csrf
                            <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                  <ion-icon name="film-outline" class="text-2xl"></ion-icon>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Upload Videos</span>
                            </button>
                        </form>
                    </li>
                @endif

                <li>
                    <form action="{{ route('subscribe.section') }}">
                        @csrf
                        <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <ion-icon name="rocket-outline" class="text-2xl"></ion-icon>
                        </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Subscribe</span>
                        </button>
                    </form>
                </li>
                <li>
                    <form action="{{ route('profile.edit') }}">
                        @csrf
                        <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                          <ion-icon name="person-outline" class="text-2xl"></ion-icon>
                        </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                        </button>
                    </form>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                              <ion-icon name="log-out" class="text-2xl"></ion-icon>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Lgout</span>
                        </button>
                    </form>
                </li>

            @endauth

            @guest()
                <li>
                    <a href="{{ route('register') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                         <ion-icon name="person" class="text-2xl"></ion-icon>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Register</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('login') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                          <ion-icon name="log-in" class="text-2xl"></ion-icon>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Login</span>
                    </a>
                </li>
            @endguest

        </ul>
        <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
    </div>
</div>
