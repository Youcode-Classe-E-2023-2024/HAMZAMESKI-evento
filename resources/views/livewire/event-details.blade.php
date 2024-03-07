@extends('layout.layout')
@section('content')
    @include('reserve-ticket-popup.confirm-reservation-form')
    <div class="h-full flex items-center justify-center">
        <div class="bg-gray-100 dark:bg-gray-800 py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                            <img class="w-full h-full object-cover" src="http://127.0.0.1:8000/storage/images/{{ $event->image }}" alt="Event Image">
                        </div>
                        <div class="flex -mx-2 mb-4">
                            <div class="w-1/2 px-2">
                                <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-full font-bold" data-bs-toggle="modal" data-bs-target="#confirmReservationModal" wire:click="reserveTicket({{$event->id}})">Reserve Ticket</button>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $event->name }}</h2>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            {{ $event->description }}
                        </p>
                        <div class="flex mb-4">
                            <div class="mr-4">
                                <span class="font-bold text-gray-700 dark:text-gray-300">Date:</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $event->date }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Place:</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $event->place }}</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Category:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ \App\Models\Category::find($event->category_id)->name }}</span>
                        </div>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Available Places:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $event->available_places }}</span>
                        </div>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Number of Reservations:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $event->nmb_reservations }}</span>
                        </div>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Ticket Price:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $event->ticket_price }} MAD</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--jQuery script--}}
<script>
    window.addEventListener('close-modal', event => {
        $('#confirmReservationModal').modal('hide');
    })
</script>
