@if(session('success'))
    <div class="bg-green-500 text-white w-[60%] mx-auto rounded-md p-4 shadow-md flex items-center justify-between mt-6">
        <div>
            <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm0 18.75c-4.925 0-8.75-3.825-8.75-8.75S5.075 1.25 10 1.25s8.75 3.825 8.75 8.75-3.825 8.75-8.75 8.75zm-2.016-6.06L7.218 9.78l1.37-1.37 1.396 1.396 3.378-3.38 1.328 1.328-4.707 4.708z"/></svg>
            <span>Implementation was handled successfully</span>
        </div>
        <form action="{{ route('endSession') }}" method="POST">
            @csrf
            <button type="submit" class="text-white hover:text-gray-200 focus:outline-none">
                <svg class="h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm0 18.75c-4.925 0-8.75-3.825-8.75-8.75S5.075 1.25 10 1.25s8.75 3.825 8.75 8.75-3.825 8.75-8.75 8.75zm2.016-6.06l-1.328 1.328-1.396-1.396-1.37 1.37 2.332 2.334 4.707-4.708-1.328-1.326z"/></svg>
            </button>
        </form>

    </div>
@endif
