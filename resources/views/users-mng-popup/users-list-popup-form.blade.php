{{-- update user item --}}
<div wire:ignore.self class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="updateUserModalLabel font-bold">Update User</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="updateUser">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>User Email</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>User Password</label>
                        <input type="text" wire:model="password" class="form-control">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
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

{{-- delete user Modal--}}
<div wire:ignore.self class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete Student</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="destroyUser">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this user ?</h4>
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


{{-- define user role --}}
<div wire:ignore.self class="modal fade" id="updateUserRoleModal" tabindex="-1" aria-labelledby="updateUserRoleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header flex justify-between">
                <h5 class="modal-title" id="updateUserRoleModal font-bold">Update User Role</h5>
                <button type="button" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close">
                    <div class="h-[20px] w-[20px]" style="background-image: url('http://127.0.0.1:8000/storage/images/close-outline.svg'); background-size: cover; background-position: center; "></div>
                </button>
            </div>
            <form wire:submit.prevent="updateUserRole">
                <div class="modal-body">
                    <div class="mb-3">
                        <select wire:model="role" class="form-control">
                            <option value="user">user</option>
                            <option value="organizer-lvl1">organizer-lvl1 (add event)</option>
                            <option value="organizer-lvl2">organizer-lvl2 (add favorits + edit event)</option>
                            <option value="organizer-lvl3">organizer-lvl3 (add favorits + edit event + delete event)</option>
                            <option value="organizer-lvl4">organizer-lvl4 (CRUD event + accepte reservations + see statistics)</option>
                        </select>
                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
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
