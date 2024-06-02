<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-home"></i>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="w-full md:w-2/3 md:pr-2 flex-col">
                <div class="rounded-lg relative p-4 w-full bg-white">
                    <div>
                        <span class="text-gray-500 font-semibold">
                        Hi, {{ explode(' ', auth()->user()->name)[0] }}!
                    </span>
                        <div class="text-2xl mt-3 font-semibold text-black/80">
                            Build your future with <span class="text-blue-500">Scholarspace</span><br>
                            Place an order today
                        </div>

                        <div class="flex mt-3">
                            <a href="{{ route('orders.index') }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">New
                                Order
                            </a>
                        </div>

                    </div>
                    <div class="absolute top-28 md:top-8 right-5">
                        <img src="{{ asset('images/svg2.png') }}" alt="Hero"
                             class="w-44 md:w-64 max-w-md mx-auto rounded-lg">
                    </div>
                </div>

                <div class="flex flex-col gap-4 py-2 mt-14">
                    <h1 class="text-2xl font-semibold text-center text-gray-800">
                        Our Service Features
                    </h1>
                    <div class="w-full">
                        <livewire:OurFeatures/>
                    </div>
                </div>


            </div>
            <div class="md:w-1/3 md:absolute rounded-lg p-4 right-0 -top-8 bg-blue-500 md:h-[103vh]">
                <div class="center mt-20">
                    <div class="center flex-col">
                        <livewire:profile-image-uploader :color="'blue-500'"/>
                        <div class="text-white text-center">
                            <h4 class="mt-3 text-xl font-semibold">{{ auth()->user()->name }}</h4>
                            <p class="text-xs text-gray-200">{{ auth()->user()->email }}</p>

                            <div class="mt-12">
                                <a href="{{ route('profile.edit') }}"
                                   class="text-white border border-white p-2 px-4 rounded-lg hover:text-white">View
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Line Break -->
                <hr class="mt-10 border-t-2 rounded-lg border-gray-100">

                <div class="mt-6 md:px-2 w-full text-white">
                    <div class="text-xl flex justify-between items-center font-semibold">
                        3 Previous Orders
                        <i class="fas btn btn-circle btn-sm bg-white text-blue-500 btn-ghost fa-calendar-alt"></i>
                    </div>

                    <div class="orders">
                        <div class="item mt-4">
                            <span class="text-sm text-gray-200">
                                12th Feb, 2024
                            </span>
                            <div
                                class="flex justify-between bg-white bg-opacity-10 p-2 w-full rounded-lg items-center mt-2">
                                <div class="flex items-center gap-4">
                                    <div class="text-lg w-14 font-semibold text-blue-50">
                                        09:00
                                    </div>
                                    <!-- Vertical Line -->
                                    <div class="w-1 h-10 rounded-lg bg-blue-700 mx-2"></div>
                                    <div class="">
                                        <h4 class="text-xs text-gray-200 font-normal">Computer Science</h4>
                                        <p class="text-lg">Java Programming</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex justify-between bg-white bg-opacity-10 p-2 w-full rounded-lg items-center mt-2">
                                <div class="flex items-center gap-4">
                                    <div class="text-lg w-14 font-semibold text-blue-50">
                                        12:34
                                    </div>
                                    <!-- Vertical Line -->
                                    <div class="w-1 h-10 rounded-lg bg-green-400 mx-2"></div>
                                    <div class="">
                                        <h4 class="text-xs text-gray-200 font-normal">History</h4>
                                        <p class="text-lg">Ukraine History</p>
                                    </div>
                                </div>
                            </div>

                            <div class="day mt-4">
                                <span class="text-sm text-gray-200">
                                    34th Oct, 2023
                                </span>

                                <div
                                    class="flex justify-between bg-white bg-opacity-10 p-2 w-full rounded-lg items-center mt-2">
                                    <div class="flex items-center gap-4">
                                        <div class="text-lg w-14 font-semibold text-blue-50">
                                            23:00
                                        </div>
                                        <!-- Vertical Line -->
                                        <div class="w-1 h-10 rounded-lg bg-red-500 mx-2"></div>
                                        <div class="mr-2">
                                            <h4 class="text-xs text-gray-200 font-normal">Philosophy</h4>
                                            <p class="text-lg text-ellipsis whitespace-nowrap mr-2">Geo Evolution</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
