

<div class="avatar relative">
    <div class="w-28 rounded-full border border-blue-500 ring-1 ring-offset-blue-500 ring-blue-200 ring-inset ring-offset-[6px]">
        <img src="{{ auth()->user()->profile_photo }}" alt="{{ auth()->user()->name }}" class="w-28 h-28 p-2 rounded-full">
        <div class="absolute top-0 left-0 w-28 h-28 rotate-[270deg] rounded-full overflow-visible">
            <svg class="w-full h-full">
                <circle cx="50%" cy="50%" r="48%" fill="transparent" stroke="white" stroke-width="4" stroke-linecap="round" stroke-dashoffset="61px" stroke-dasharray="288.88px"></circle>
            </svg>
        </div>
        @if (!$profilePhoto)
        <!-- Camera Icon -->
        <div class="absolute bottom-0 right-0 text-white rounded-full">
            <label for="profilePhoto" class="btn btn-sm btn-circle btn-warning fas fa-camera cursor-pointer"></label>
            <input type="file" id="profilePhoto" wire:model="profilePhoto" class="hidden">
        </div>
        @else
            <div class="absolute bottom-0 right-0 text-white rounded-full">
                <button wire:click="save" class="btn btn-sm btn-circle btn-info ring ring-white">
                    <i class="fas text-black/60 fa-check"></i>
                </button>
            </div>
        @endif
        @error('profilePhoto') <span class="error">{{ $message }}</span> @enderror
    </div>
</div>

