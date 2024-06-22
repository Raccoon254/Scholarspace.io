<div class="navbar bg-white sticky">
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
                <div class="hidden md:flex items-center px-4 gap-2">
                    <x-application-logo class="h-10"/>
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
        <div class="md:hidden flex gap-2 center mr-4">
            <x-application-logo class="h-6"/>
            <span class="text-lg text-black/80 font-bold">
                Scholarspace
            </span>
        </div>
    </div>
    <div class="navbar-end text-black/80 items-center">
        <div class="btn btn-circle bg-gray-100 btn-sm btn-ghost relative center">
            <i class="fas fa-envelope"></i>
            @if($hasMessages)
                <span class="custom-badge"></span>
            @endif
        </div>
        <div class="btn btn-circle bg-gray-100 btn-sm btn-ghost relative ml-2 center">
            <i class="fas fa-bell-slash"></i>
            <!-- <i class="fas fa-bell"></i> -->
            <!-- <span class="custom-badge"> auth->notifications->unread() </span> -->
        </div>
        <div class="h-8 w-8 ml-2 avatar rounded-full p-[2px] ring-1 dropdown dropdown-end">
            <img tabindex="0" role="button" class="h-8 w-8 ring-1 ring-white rounded-full"
                 src="{{ auth()->user()->profile_photo }}" alt="{{ auth()->user()->name }}"/>

            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-white rounded-lg ring ring-blue-500 ring-opacity-40 w-52">
                <li>
                    <a href="{{ route('profile.edit') }}" class="flex gap-2">
                        <i class="fas fa-user text-gray-500"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders.index') }}" class="flex gap-2">
                        <i class="fas fa-shopping-bag text-gray-500"></i>
                        <span>Orders</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
