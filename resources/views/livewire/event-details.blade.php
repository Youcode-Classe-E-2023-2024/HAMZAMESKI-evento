<div>
    <style>
        .SCALE {
            background-color: rgba(0, 0, 0, 0.53);
            backdrop-filter: blur(1px);
        }
    </style>
    @include('reserve-ticket-popup.confirm-reservation-form')

    <div class="h-full flex items-center justify-center">
        <div class="border-[1px] border-solid border-gray-500 py-8 rounded-md SCALE">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                            <img class="w-full h-full object-cover" src="http://127.0.0.1:8000/storage/images/{{ $event->image }}" alt="Event Image">
                        </div>
                        <div class="flex -mx-2 mb-4">
                            <div class="w-1/2 px-2">
                                @if($event->available_places <= 0)
                                    <div class="w-full bg-yellow-300 text-white py-2 px-4 rounded-full font-bold">Sold Out</div>

                                @elseif(App\Models\Reservation::where('user_id', auth()->id())->where('event_id', $event->id)->where('pending', '1')->first())
                                    <div class="w-full bg-green-300 text-white py-2 px-4 rounded-full font-bold">Pending</div>

                                @elseif(App\Models\Reservation::where('user_id', auth()->id())->where('event_id', $event->id)->where('pending', '0')->first())
                                    <div class="w-full bg-pink-300 text-white py-2 px-4 rounded-full font-bold">Ticket Reserved</div>

                                @else
                                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-full font-bold" data-bs-toggle="modal" data-bs-target="#confirmReservationModal" wire:click="reserveTicket({{$event->id}})">Reserve Ticket</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $event->name }}</h2>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            {{ $event->description }}
                        </p>

                        {{-- as table --}}
                        <div class="mb-4">
                            <table class="table-auto border border-gray-300">
                                <tbody>
                                <tr>
                                    <td class="font-bold text-gray-700 dark:text-gray-300 pr-4 border-b border-gray-300 px-4 py-2">Date:</td>
                                    <td class="text-gray-600 dark:text-gray-300 border-b border-gray-300 border-l-[1px] px-4">{{ $event->date }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-gray-700 dark:text-gray-300 pr-4 border-b border-gray-300 px-4 py-2">Location:</td>
                                    <td class="text-gray-600 dark:text-gray-300 border-b border-gray-300 border-l-[1px] border-l-[1px] px-4">{{ $event->place }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-gray-700 dark:text-gray-300 pr-4 border-b border-gray-300 px-4 py-2">Category:</td>
                                    <td class="text-gray-600 dark:text-gray-300 border-b border-gray-300 border-l-[1px] border-l-[1px] px-4">{{ \App\Models\Category::find($event->category_id)->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-gray-700 dark:text-gray-300 pr-4 border-b border-gray-300 px-4 py-2">Available Places:</td>
                                    <td class="text-gray-600 dark:text-gray-300 border-b border-gray-300 border-l-[1px] border-l-[1px] px-4">{{ $event->available_places }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-gray-700 dark:text-gray-300 pr-4 border-b border-gray-300 px-4 py-2">Number of Reservations:</td>
                                    <td class="text-gray-600 dark:text-gray-300 border-b border-gray-300 border-l-[1px] border-l-[1px] px-4">{{ $event->nmb_reservations }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mb-4">
                            <span class="font-bold text-gray-600 dark:text-gray-300 bg-orange-500 px-3 py-2 border-[1px] border-solid border-orange-500">Ticket Price:</span>
                            <span class="text-gray-600 dark:text-gray-300 px-3 py-2 border-[1px] border-solid border-orange-500">{{ $event->ticket_price }} MAD</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--jQuery script--}}
    <script>
        window.addEventListener('close-modal', event => {
            $('#confirmReservationModal').modal('hide');
        })
    </script>

</div>
