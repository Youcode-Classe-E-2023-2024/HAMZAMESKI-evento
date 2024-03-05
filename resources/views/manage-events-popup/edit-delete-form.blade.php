{{-- update rss item --}}
<div wire:ignore.self class="modal fade" id="updateEventModal" tabindex="-1" aria-labelledby="updateEventModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="updateEventModalLabel">Edit Student</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="updateEvent">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Event Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Event description</label>
                        <input type="text" wire:model="description" class="form-control">
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date">Event Date</label>
                        <input type="date" id="date" wire:model="date" class="form-control">
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Event Place</label>
                        <input type="text" wire:model="place" class="form-control">
                        @error('place') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Event Category</label>
                        <input type="text" wire:model="category" class="form-control">
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Available places</label>
                        <input type="number" wire:model="available_places" class="form-control">
                        @error('available_places') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white btn hover:bg-gray-600 bg-gray-500 border-0" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="text-white btn hover:bg-purple-600 bg-purple-500 border-0">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- delete rss item Modal--}}
<div wire:ignore.self class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="deleteEventModalLabel">Delete Student</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="destroyEvent">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this event?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white btn hover:bg-gray-600 bg-gray-500 border-0" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="text-white btn hover:bg-red-600 bg-red-500 border-0">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- acceptance --}}
<div wire:ignore.self class="modal fade" id="updateAcceptanceModal" tabindex="-1" aria-labelledby="updateAcceptanceModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="updateAcceptanceModal">Edit Student</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="updateAcceptance">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Acceptance system</label>
                        <select wire:model="acceptance" class="form-control">
                            <option value="automatic">Automatic</option>
                            <option value="manual">Manual</option>
                        </select>
                        @error('acceptance') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white btn hover:bg-gray-600 bg-gray-500 border-0" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="text-white btn hover:bg-purple-600 bg-purple-500 border-0">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
