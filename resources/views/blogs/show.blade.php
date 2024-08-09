@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-lg rounded-lg">
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $blog->title }}</h1>
                <p class="text-gray-600 text-sm mt-2">by {{ $blog->user->name }} on {{ $blog->created_at->format('F j, Y') }}</p>
                <div class="mt-4 text-gray-700 leading-relaxed">
                    {!! $blog->content !!}
                </div>
                @if ($blog->images->isNotEmpty())
                    <div class="mt-6">
                        <h2 class="text-2xl font-bold text-gray-800">Images</h2>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            @foreach ($blog->images as $image)
                                <img src="{{ Storage::url($image->path) }}" alt="{{ $image->alt }}" class="rounded-lg">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
