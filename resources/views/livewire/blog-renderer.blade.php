<div class="container mx-auto py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Blog Posts</h1>

    @forelse ($blogs as $blog)
        <div class="bg-white shadow-lg rounded-lg mb-8">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800">{{ $blog->title }}</h2>
                <p class="text-gray-600 text-sm mt-2">by {{ $blog->user->name }} on {{ $blog->created_at->format('F j, Y') }}</p>
                <div class="mt-4 text-gray-700 leading-relaxed">
                    {!! Str::limit($blog->content, 300) !!}
                </div>
                <a href="{{ route('blog.show', $blog) }}" class="text-blue-500 mt-4 inline-block">Read More</a>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-600">No blog posts available.</p>
    @endforelse
</div>
