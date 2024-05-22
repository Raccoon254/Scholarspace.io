<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-users"></i>
            {{ __('Manage Users') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="w-full md:w-2/3 md:pr-2 flex-col">
                <div class="rounded-lg relative p-4 w-full bg-white">
                    <h1>Manage Users</h1>
                    <div class="card">
                        <div class="card-header">
                            <input type="text" wire:model.live="search" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Search Users">
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
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
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="flex">
                                            <button class="custom-btn">Edit</button>
                                            <button class="custom-btn">Delete</button>
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
    </div>
</div>
