<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 leading-tight">
            <i class="fas text-blue-500 fa-envelope"></i>
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 gap-4 lg:mx-4 h-full flex-row">
            <div class="h-screen flex gap-2 bg-white w-full rounded-lg">
                @if($currentUserRole == 'writer')
                    <div class="w-1/3 p-3 flex overflow-y-auto flex-col gap-3 rounded-lg">
                        <!-- Search -->
                        <div class="flex sticky flex-col rounded-lg">
                            <div class="flex relative gap-3 bg-gray-100 rounded-lg">
                                <input type="text" wire:model.live="search" placeholder="Type to search ..."
                                       class="w-full p-2 rounded-lg border border-gray-200 focus:outline-none">
                                <div
                                    class="absolute text-black/80 right-5 top-[50%] transform translate-x-1/2 -translate-y-1/2">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="h-screen flex overflow-y-auto flex-col gap-3 rounded-lg">

                            <!-- All users -->
                            @foreach($clients as $user)
                                <div class="flex gap-3 cursor-pointer p-2 bg-gray-100 rounded-lg">
                                    <div class="">
                                        <img src="{{ $user->profile_photo }}" alt="{{ $user->name }}"
                                             class="w-12 h-12 rounded-full">
                                    </div>
                                    <div class="w-2/3" wire:click="openChat({{ $user->id }})">
                                        <h1 class="text-gray-800 font-semibold">{{ $user->name }}</h1>

                                        <!-- Last message from user -->
                                        <p class="text-gray-500 text-xs">
                                            {{ $user->lastMessage ? $user->lastMessage->message : 'No message yet' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                @endif
                <div class="h-screen bg-gray-500 w-2/3 rounded-lg">

                </div>
            </div>
        </div>
    </div>
</div>
