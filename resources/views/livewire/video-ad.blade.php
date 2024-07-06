<div>
    @guest
        <div class="{{ $status }}">
            <div class="center p-5 md:pt-12 w-full">
                <div class="max-w-3xl relative rounded-2xl ring ring-gray-300 border overflow-clip">
                    <video class="w-full" autoplay loop muted>
                        <source src="{{ asset('video/ad.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <button data-tip="Close Video Section" class="absolute tooltip tooltip-left top-2 right-2 bg-white btn btn-ghost btn-circle btn-xs hover:text-white hover:border border-red-400 text-red-500 hover:bg-red-600 shadow-md" wire:click="closeVideo">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        @if($status == 'hidden')
            <div class="w-full flex justify-start mt-5 px-10">
                <button class="btn btn-ghost ring-1 ring-green-200 border border-gray-300 mb-1 btn-sm" wire:click="showVideo">Show Video</button>
            </div>
        @endif
    @endguest
</div>
