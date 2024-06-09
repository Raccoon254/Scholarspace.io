<x-logged-out>
    <x-slot name="title">
        404 Not found - Scholarspace
    </x-slot>

    <div class="container text-black/80 mx-auto px-4 py-8 md:py-10">
        <h1 class="text-5xl text-blue-500 font-bold mb-4">Oops! Page not found.</h1>
        <p class="mb-6">We couldn't find the page you were looking for. This is either because:</p>
        <ul class="list-disc list-inside  mb-6">
            <li>There is an error in the URL entered into your web browser. Please check the URL and try again.</li>
            <li>The page you are looking for has been moved or deleted.</li>
        </ul>
        <p class="mb-4">You can return to our homepage by clicking the button below </p>
        <a href="{{ route('home') }}" class="custom-btn">
            Here <i class="fa fa-home"></i>
        </a>
    </div>
</x-logged-out>
