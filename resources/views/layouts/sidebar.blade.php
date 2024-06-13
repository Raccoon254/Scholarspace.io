<div class="drawer md:w-60 absolute md:static z-50 lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-side flex z-50 flex-col justify-between h-full">
        <label for="my-drawer-2" aria-label="close sidebar" class="z-40 absolute drawer-overlay"></label>
        <ul class="menu bg-white px-4 md:pt-0 w-60 h-[100vh] text-black/90">
            <!-- CLose Sidebar -->
            <li class="absolute top-0 right-0 md:hidden">
                <div class="flex justify-end p-4">
                    <label for="my-drawer-2" class="cursor-pointer ring-gray-300 btn btn-sm btn-circle btn-ghost ring ring-inset ring-offset-2 z-50">
                        <i class="fas fa-times"></i>
                    </label>
                </div>
            </li>
            <li class="md:hidden mt-4 mb-2">
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
                    @if($hasMessages)
                        <span class="custom-badge"></span>
                    @endif
                </a>
            </li>
            <li class="side {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                <a href="{{ route('orders.index') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
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

            @can('manage')
                <li class="side {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="side {{ request()->routeIs('payments.*') ? 'active' : '' }}">
                    <a href="{{ route('payments.index') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                        <i class="fas fa-credit-card"></i>
                        <span>Payments</span>
                    </a>
                </li>
            @endcan
            <li class="side {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>

        <div class="flex bottom-0 w-60 items-center justify-center bg-white p-2 md:w-full">
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
