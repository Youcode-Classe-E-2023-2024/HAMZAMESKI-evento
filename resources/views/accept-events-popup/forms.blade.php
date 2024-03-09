
{{-- accept event --}}
<div wire:ignore.self class="modal fade" id="acceptEventModal" tabindex="-1" aria-labelledby="acceptEventModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="acceptEventModalLabel">Accept Event</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="acceptEvent">
                <div class="modal-body">
                    <h4>Confirm pulishing the event</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white btn hover:bg-gray-600 bg-gray-500 border-0" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="text-white btn hover:bg-red-600 bg-red-500 border-0">Yes! Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- event details --}}
<div wire:ignore.self class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title font-bold" id="eventDetailsModalLabel">Event Details</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center;"></div>
                </button>
            </div>
            <main>
                <div class="modal-body">
                    @if($event)
                        <div class="mb-3">
                            <label class="fw-bold">Event Title</label>
                            <div>{{ $event->name }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Event Description</label>
                            <div>{{ substr($event->description, 0, 200) }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Event Date</label>
                            <div>{{ $event->date }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Event Location</label>
                            <div>{{ $event->place }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Available Places</label>
                            <div>{{ $event->available_places }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Event Category</label>
                            <div>{{ App\Models\Category::where('id', $event->category_id)->first()->name }}</div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white btn hover:bg-gray-600 bg-gray-500 border-0" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                </div>
            </main>
        </div>
    </div>
</div>
