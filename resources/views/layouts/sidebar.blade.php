<div class="drawer md:w-60 absolute md:static z-50 lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
        <!-- Page content here -->
    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-white px-4 pt-0 w-60 min-h-full text-black/90">
            <!-- Sidebar content here -->
            <li class="side {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-home"></i>
                    <span>Discover</span>
                </a>
            </li>
            <li class="side {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 p-2 hover:bg-gray-200">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </div>
</div>
