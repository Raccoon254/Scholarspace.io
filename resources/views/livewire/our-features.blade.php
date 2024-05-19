<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    @foreach($features as $feature)
        <div class="flex flex-col bg-white h-44 p-2 rounded-lg">
            <div class="flex flex-col bg-white h-44 p-2 rounded-lg">
                <i class="fas btn btn-square mb-3 rounded-md btn-ghost bg-gray-100 btn-sm {{ $feature['icon'] }} text-blue-500"></i>
                <div>
                    <h2 class="font-bold text-black/80 text-lg">{{ $feature['title'] }}</h2>
                    <p class="text-gray-500">{{ $feature['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
