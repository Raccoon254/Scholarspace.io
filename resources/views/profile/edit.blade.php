<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-user-circle"></i>
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="overflow-clip mx-0 md:mx-4 md:w-2/3 rounded-lg h-[85vh]">
        <div class="h-[85vh] overflow-scroll flex flex-col gap-4">
            <div class="p-4 bg-white shadow-sm sm:rounded-lg">
                <div class="w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow-sm sm:rounded-lg">
                <div class="w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow-sm sm:rounded-lg">
                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
