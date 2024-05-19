<div class="drawer md:w-60 absolute md:static z-50 lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content flex flex-col items-center justify-center">
        <!-- Page content here -->
    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-white px-4 pt-0 w-60 h-[80vh] text-black/90">
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
                    <span>Messages</span>
                    <span class="custom-badge"></span>
                </a>
            </li>
            <li class="side {{ request()->routeIs('orders') ? 'active' : '' }}">
                <a href="{{ route('orders') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-shopping-cart"></i>
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

        <div class="flex items-center justify-center p-2 w-full">
            <form class="w-full" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn text-red-600 btn-warning w-full">
                    Logout
                    <i class="fas fa-lock"></i>
                </button>
            </form>
        </div>
    </div>
</div>
