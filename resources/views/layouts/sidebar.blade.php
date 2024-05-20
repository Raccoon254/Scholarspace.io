<div class="drawer md:w-60 absolute md:static z-50 lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content flex flex-col items-center justify-center">
        <!-- Page content here -->
    </div>
    <div class="drawer-side flex flex-col justify-between h-full">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-white px-4 md:pt-0 w-60 h-[82vh] text-black/90">
            <li class="md:hidden mb-2">
                <div class="flex center items-center justify-center gap-2 p-4">
                    <x-application-logo class="h-5"/>
                    <span class="text-lg font-bold">Scholarspace</span>
                </div>
            </li>
            <!-- Sidebar content here -->
            <li class="side {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="side {{ request()->routeIs('messages') ? 'active' : '' }}">
                <a href="{{ route('messages') }}" class="flex relative items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-envelope"></i>
                    <span>
                        {{ auth()->user()->role == 'client' ? 'Support' : 'Messages' }}
                    </span>
                    @if(auth()->user()->hasUnreadMessages)
                        <span class="custom-badge"></span>
                    @endif
                </a>
            </li>
            <li class="side {{ request()->routeIs('orders') ? 'active' : '' }}">
                <a href="{{ route('orders') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Orders</span>
                </a>
            </li>
            <!-- Referral -->
            <li class="side {{ request()->routeIs('referrals') ? 'active' : '' }}">
                <a href="{{ route('referrals') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-users-cog"></i>
                    <span>Referral</span>
                </a>
            </li>
            <li class="side {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>

        <div class="flex bottom-0 w-60 items-center justify-center p-2 md:w-full">
            <form class="w-full" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md w-full">
                    Logout
                    <i class="fas fa-lock"></i>
                </button>
            </form>
        </div>
    </div>
</div>
