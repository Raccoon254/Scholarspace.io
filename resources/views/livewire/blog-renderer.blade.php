<div class="container mx-auto p-3">
    <h1 class="text-4xl font-bold text-center mb-4">Blog Posts</h1>
    <div class="flex flex-col rounded-lg gap-1">
        @foreach($blogs as $blog)
            <div class="bg-white rounded-lg w-full border-b border-blue-500 mb-3">
                <div class="p-4 relative">
                    <div class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 rounded-bl-lg rounded-tr-lg">
                        <a href="{{ route('blog.show', $blog) }}" class="ring-offset-2 btn-md ring-gray-500 border-gray-300 mt-4">
                            Read More &rarr;
                        </a>
                    </div>
                    <h2 class="text-2xl capitalize font-bold text-gray-800">{{ $blog->title }}</h2>
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
