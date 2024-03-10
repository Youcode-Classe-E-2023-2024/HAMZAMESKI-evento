<!-- confirm reservation -->
<div wire:ignore.self class="modal fade" id="confirmReservationModal" tabindex="-1" aria-labelledby="confirmReservationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="confirmReservationModal"></h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="confirmReservation">
                <div class="modal-body">
                    <h4>Confirm ticket reservaion for that event</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white btn hover:bg-gray-600 bg-gray-500 border-0" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="text-white btn hover:bg-green-600 bg-green-500 border-0">Yes! reserve</button>
                </div>
            </form>
        </div>
    </div>
</div>
