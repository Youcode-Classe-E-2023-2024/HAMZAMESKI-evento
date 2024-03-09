<div id="dashboard-container" class="mt-8 flex items-center justify-center">
    @include('users-mng-popup.users-list-popup-form')
    <section class="mt-10 w-full">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div
                class="backdrop-blur-sm relative shadow-md sm:rounded-lg overflow-hidden border-green-500 border-solid border-[.5px]"
                style="background-color: rgba(0, 0, 0, 0.403);">
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
                                          clip-rule="evenodd"/>
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
                                <span>name</span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span>email</span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span>created at</span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                updated at
                            </th>
                            <th scope="col" class="px-4 py-3">
                                role
                            </th>
                            <th scope="col" class="px-4 py-3">
                                handle
                            </th>
                            <th scope="col" class="px-4 py-3">
                                delete
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            @if(!$user->hasRole('admin'))
                                @if($user->roles->first()->name == 'user')
                                    @php
                                        $color = 'gray'
                                    @endphp
                                @elseif($user->roles->first()->name == 'organizer_lvl1')
                                    @php
                                        $color = 'yellow'
                                    @endphp
                                @elseif($user->roles->first()->name == 'organizer_lvl2')
                                    @php
                                        $color = 'orange'
                                    @endphp
                                @elseif($user->roles->first()->name == 'organizer_lvl3')
                                    @php
                                        $color = 'red'
                                    @endphp
                                @elseif($user->roles->first()->name == 'organizer_lvl4')
                                    @php
                                        $color = 'green'
                                    @endphp
                                @else
                                    @php
                                        $color = 'gray'
                                    @endphp
                                @endif
                                <tr class="border-b dark:border-gray-700">
                                    <td scope="col" class="px-4 py-3 text-white">{{ substr($user->name, 0, 20) }}...
                                    </td>
                                    <td scope="col"
                                        class="px-4 py-3 text-gray-300">{{ substr($user->email, 0, 20) }}</td>
                                    <td scope="col" class="px-4 py-3 text-gray-300">{{ $user->created_at }}</td>
                                    <td scope="col" class="px-4 py-3 text-gray-300">{{ $user->updated_at }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateUserRoleModal"
                                                wire:click="editUserRole({{$user->id}})"
                                                class="btn text-white border-1 border-solid border-gray-200 bg-{{ $color }}-500 hover:bg-{{ $color }}-600">
                                            {{ $user->roles->first()->name }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateUserModal"
                                                wire:click="editUser({{$user->id}})" class="btn btn-primary">
                                            Edit
                                        </button>
                                    </td>
                                    <td scope="col" class="px-4 py-3 flex items-center justify-end">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                                wire:click="deleteUser({{$user->id}})" class="btn btn-danger">Delete
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm text-white font-bold">Per Page</label>
                            <select
                                wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </section>
</div>

{{-- jQuery script --}}
<script>
    window.addEventListener('close-modal', event => {
        $('#updateUserModal').modal('hide');
        $('#deleteUserModal').modal('hide');
        $('#updateUserRoleModal').modal('hide');

    })
</script>
