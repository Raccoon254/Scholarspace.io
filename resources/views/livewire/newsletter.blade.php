<div class="">
    @if (session()->has('message'))
        <div class="text-white w-full alert alert-warning rounded-none bg-green-500">
            {{ session('message') }}
        </div>
    @endif
    <div class="center flex-col bg-blue-500 p-4 md:p-14">
        <form class="w-full max-w-md flex flex-col gap-4 center bg-blue-500 items-center" wire:submit.prevent="subscribe">
            @csrf
            <x-text-input type="email" wire:model="email" autocomplete="email" placeholder="Your email address" required />
            @error('email')
            <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
            <button class="py-2 text-blue-500 font-semibold w-full bg-white px-4 rounded-md ring" type="submit">
                Subscribe
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>
