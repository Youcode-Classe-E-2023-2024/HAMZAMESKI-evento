<div>
    <h4>
        <button type="button" class="bg-pink-500 py-3 px-2 text-white mt-8 ml-6 rounded" data-bs-toggle="modal" data-bs-target="#eventModal">
            Add New Event
        </button>
    </h4>
    <div id="dashboard-container" class=" flex items-center justify-center">
        @include('manage-events-popup.forms')

        <section class="mt-10 w-full">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                <div class="backdrop-blur-sm relative shadow-md sm:rounded-lg overflow-hidden border-pink-500 border-solid border-[.5px]" style="background-color: rgba(0, 0, 0, 0.203);">
                    <div class="flex items-center justify-between d p-4">
                        <div class="flex">
                            <div class="relative">
                                <input wire:model.live.debounce.300s="search" type="text"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 pr-4 py-2"
                                       placeholder="Search" required="">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    name
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    category
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    event date
                                </th>
                                @if(auth()->user()->hasPermissionTo('accepte reservations'))
                                    <th scope="col" class="px-4 py-3">
                                        acceptance
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Reservers
                                    </th>
                                @endif
                                <th scope="col" class="px-4 py-3">
                                    available places
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    nmb reservations
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    is published
                                </th>
                                @if(auth()->user()->hasPermissionTo('edit event'))
                                    <th scope="col" class="px-4 py-3">
                                        edit
                                    </th>
                                @endif
                                @if(auth()->user()->hasPermissionTo('delete event'))
                                    <th scope="col" class="px-4 py-3">
                                        delete
                                    </th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($events as $event)
                                <tr  class="border-b dark:border-gray-700">
                                    <td scope="col" class="px-4 py-3 text-white" >{{ $event->name }}</td>
                                    <td scope="col" class="px-4 py-3 text-white">{{ \App\Models\Category::find($event->category_id)->name }}</td>
                                    <td scope="col" class="px-4 py-3 text-white">{{ $event->date }}</td>
                                    @if(auth()->user()->hasPermissionTo('accepte reservations'))
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateAcceptanceModal" wire:click="editAcceptance({{$event->id}})" class="btn  {{ $event->acceptance == 'manual'? 'bg-green-500 hover:bg-green-600' : 'bg-purple-500 hover:bg-purple-600' }}">
                                                {{ $event->acceptance }}
                                            </button>
                                        </td>
                                        <td>
                                            @if($event->acceptance == 'automatic')
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">-</span>
                                                </div>
                                            @else
                                                <div class="flex items-center justify-center">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#acceptReserversModal" wire:click="handleReservers({{$event->id}})" class="btn btn-primary">
                                                        Display
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                    <td scope="col" class="px-4 py-3 text-white">{{ $event->available_places }}</td>
                                    <td scope="col" class="px-4 py-3 text-white">{{ $event->nmb_reservations }}</td>
                                    <td scope="col" class="px-4 py-3 text-white">{{ ($event->is_published == '1') ? '✔' : 'not yet' }}</td>
                                    @if(auth()->user()->hasPermissionTo('edit event'))
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateEventModal" wire:click="editEvent({{$event->id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                        </td>
                                    @endif
                                    @if(auth()->user()->hasPermissionTo('delete event'))
                                        <td scope="col" class="px-4 py-3 flex items-center justify-end">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteEventModal" wire:click="deleteEvent({{$event->id}})" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm text-white font-bold">Per Page</label>
                                <select
                                    wire:model.live = 'perPage'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{--jQuery script--}}
    <script>
        window.addEventListener('close-modal', event => {
            $('#eventModal').modal('hide');
            $('#updateEventModal').modal('hide');
            $('#deleteEventModal').modal('hide');
            $('#updateAcceptanceModal').modal('hide');
            $('#acceptReserversModal').modal('hide');
        })
    </script>
</div>

