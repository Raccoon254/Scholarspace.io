<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-green-500 fa-shopping-bag"></i>
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex gap-4 sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="bg-white overflow-hidden relative md:w-2/3 rounded-lg">

                <!-- Cover Photo -->
                <img class="h-64 w-full object-cover bg-cover bg-center"
                        src="{{ asset('images/bg/3.jpg') }}"
                        alt="Cover Photo">

                    <img class="w-32 bg-white h-32 rounded-full absolute top-50 left-1/2 transform -translate-x-1/2 -translate-y-1/2 border-4 border-white"
                         src="{{ $user->profile_photo }}"
                         alt="Profile Photo">

                <!-- Profile and Details -->
                <div class="flex flex-col items-center mt-8">
                    <div class="w-full max-w-2xl bg-white rounded-lg p-6">

                        <div class="text-center mt-2">
                            <h1 class="text-2xl font-semibold">{{ $user->name }}</h1>
                            <p class="text-gray-600">{{ $user->age }} - {{ $user->location }}</p>
                        </div>
                        <div class="mt-4 flex justify-center gap-4">
                            <div class="text-center">
                                <span class="block text-2xl font-bold">{{ $user->orders->count() }}</span>
                                <span class="text-gray-500">Orders</span>
                            </div>
                            <div class="text-center">
                                <span class="block text-2xl font-bold">...</span>
                                <span class="text-gray-500">Storage</span>
                            </div>
                            <div class="text-center">
                                <span class="block text-2xl font-bold">...</span>
                                <span class="text-gray-500">Photos</span>
                            </div>
                        </div>
                        <div class="mt-6">
                            <ul class="flex justify-center gap-4">
                                <li><a href="#" class="text-blue-500">Activity</a></li>
                                <li><a href="#" class="text-gray-500">Profile</a></li>
                                <li><a href="#" class="text-gray-500">Settings</a></li>
                                <li><a href="#" class="text-gray-500">Storage</a> </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Recent Posts or Orders -->
                    <div class="w-full max-w-2xl bg-white rounded-lg mt-6 p-6">
                        <!-- Joined date and last edited and seen -->

                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-xs">Joined {{ $user->created_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs">Last seen ... </p>
                            </div>
                        </div>

                        <h2 class="text-lg font-semibold mb-4"> Recent Orders </h2>
                        @php
                            $recent_orders = $user->orders->take(3);
                        @endphp

                        @foreach ($recent_orders as $order)
                            <div class="bg-gray-50 p-4 rounded-lg mb-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-gray-800 font-semibold">{{ $order->title }}</h3>
                                        <p class="text-gray-400 text-xs">{{ $order->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div>
                                        <a href="{{ route('orders.show', $order) }}"
                                           class="text-blue-500">
                                            View
                                        </a>
                                    </div>
                                </div>
                                <p class="mt-2 text-gray-700">{{ $order->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
