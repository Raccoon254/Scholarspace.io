<div class="navbar bg-white">
    <div class="navbar-start">
        <div class="center">
            <div class="md:w-60">
                <label for="my-drawer-2" class="md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="black">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </label>
                <div class="hidden md:flex items-center justify-center px-4 gap-2">
                    <x-application-logo class="h-5"/>
                    <span class="text-lg text-black/80 font-bold">
                        Scholarspace
                    </span>
                </div>
            </div>
            <!-- Page Heading -->
            @if (isset($header))
                <div class="max-w-7xl hidden md:block text-lg text-black/80 font-bold px-2">
                    {{ $header }}
                </div>
            @endif
        </div>
    </div>
    <div class="navbar-center">
        <div class="md:hidden flex gap-2 center">
{{--            <x-application-logo class="h-5"/>--}}
            <span class="text-lg text-black/80 font-bold">
                Scholarspace
            </span>
        </div>
    </div>
    <div class="navbar-end text-black/80 items-center">
        <div class="btn btn-circle bg-gray-100 btn-sm btn-ghost relative center">
            <i class="fas fa-envelope"></i>
            <span class="custom-badge">
            </span>
        </div>
        <div class="btn btn-circle bg-gray-100 btn-sm btn-ghost relative ml-2 center">
            <i class="fas fa-bell-slash"></i>
            <!-- <i class="fas fa-bell"></i> -->
            <!-- <span class="custom-badge"> auth->notifications->unread() </span> -->
        </div>
        <a href="#" class="h-8 w-8 ml-2 avatar rounded-full p-[2px] ring-1">
            <img class="h-8 w-8 ring-1 ring-white rounded-full"
                 src="{{ auth()->user()->profile_photo }}" alt="{{ auth()->user()->name }}"/>
        </a>
    </div>
</div>
