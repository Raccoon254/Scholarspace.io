<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-users"></i>
            {{ __('Manage Users') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl text-black/80 relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="w-full md:pr-2 flex-col">
                <div class="rounded-lg p-4 relative w-full bg-white">
                    <h1>Manage Users</h1>
                    <div class="card-header max-w-md relative">
                        <input type="text" wire:model.live="search" class="w-full p-2 border border-gray-300 rounded-lg"
                               placeholder="Search Users">
                        <i class="fas fa-search absolute top-3 right-3 text-gray-400"></i>
                    </div>
                    <table class="table my-4 ring-1 ring-blue-200 overflow-clip">
                        <thead>
                        <tr class="bg-gray-100 text-gray-600 text-sm">
                            <th>Id</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <img src="{{ $user->profile_photo }}" alt="{{ $user->name }}"
                                         class="w-10 h-10 ring-1 ring-blue-200 rounded-full">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="flex gap-2">
                                    <button class="custom-btn">Edit</button>
                                    <button class="custom-danger-btn">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
