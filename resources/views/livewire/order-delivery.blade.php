<div>
    <form wire:submit.prevent="saveDelivery">
        <div>
            <label for="status">Status</label>
            <input type="text" id="status" wire:model="status">
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" wire:model="description"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="attachments">Attachments</label>
            <input type="file" id="attachments" wire:model="attachments" multiple>
            @error('attachments.*') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Create Delivery</button>
    </form>

    @if (session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
</div>
