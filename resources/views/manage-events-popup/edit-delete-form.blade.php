{{-- update rss item --}}
<div wire:ignore.self class="modal fade" id="updateRssItemModal" tabindex="-1" aria-labelledby="updateRssItemModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="updateRssItemModalLabel">Edit Student</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="updateRssItem">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>RSS item Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>RSS item Category</label>
                        <input type="text" wire:model="category" class="form-control">
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>RSS item Link</label>
                        <input type="text" wire:model="link" class="form-control">
                        @error('link') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>RSS item Description</label>
                        <input type="text" wire:model="description" class="form-control">
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
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
<div wire:ignore.self class="modal fade" id="deleteRssItemModal" tabindex="-1" aria-labelledby="deleteRssItemModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="deleteRssItemModalLabel">Delete Student</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="destroyRssItem">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this item ?</h4>
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
