<div class="py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 leading-tight">
            <i class="fas text-blue-500 fa-home"></i>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="w-full md:w-2/3 md:pr-2 flex-col">
                <div class="top rounded-lg relative p-4 w-full bg-white">
                    <div>
                        <span class="text-gray-500 font-semibold">
                        Hi, {{ explode(' ', auth()->user()->name)[0] }}!
                    </span>
                        <div class="text-2xl mt-3 font-semibold text-black/80">
                            Build your future with <span class="text-blue-500">Scholarspace</span><br>
                            Place an order today
                        </div>

                        <div class="flex mt-3">
                            <a href="{{ route('orders') }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">New Order
                            </a>
                        </div>
                    </div>
                    <div class="absolute top-8 right-5">
                        <img src="{{ asset('images/svg2.png') }}" alt="Hero" class="w-64 max-w-md mx-auto rounded-lg">
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 md:absolute p-4 right-0 -top-8 bg-amber-500">
                <div class="center mt-20">
                    <div class="profile-header">
                        <div class="center flex-col">
                            <div class="avatar">
                                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                    <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                            <div class="profile-header-info">
                                <h4 class="mt-3 text-white">{{ auth()->user()->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
