<div class="container mx-auto p-3">
    <h1 class="text-4xl font-bold text-center mb-4">Blog Posts</h1>
    <div class="flex flex-col rounded-lg gap-8">
        @foreach($blogs as $blog)
            <div class="bg-white rounded-lg w-full border-b border-blue-500 mb-8">
                <div class="p-4">
                    <a href="{{ route('blog.show', $blog) }}" class="text-blue-500 mt-4 inline-block">Read More</a>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $blog->title }}</h2>
                    <p class="text-gray-600 text-sm mt-2">by {{ $blog->user->name }} on {{ $blog->created_at->format('F j, Y') }}</p>
                    <div class="mt-4 text-gray-700 leading-relaxed">
                        {!! Str::limit($blog->content, 300) !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        @if($blogs->isEmpty())
            <p class="text-center text-gray-600">No blog posts available.</p>
        @endif
    </div>
</div>
