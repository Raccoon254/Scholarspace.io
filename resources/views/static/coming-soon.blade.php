<x-logged-out>
    <x-slot name="title">
        Coming Soon - Scholarspace
    </x-slot>

    <div class="container text-black/80 mx-auto px-4 py-8 md:py-10">
        <h1 class="text-5xl text-blue-500 font-bold mb-4">Coming Soon!</h1>
        <p class="mb-6">Our developers are working hard to put together the remaining parts of the website. We're excited to bring you new features such as:</p>
        <ul class="list-disc list-inside mb-6">
            <li>Improved User Interface</li>
            <li>Advanced Search Options</li>
            <li>Personalized User Experience</li>
        </ul>
        <p class="mb-4">We're aiming to launch these new features in the next few months. Please check back later. We appreciate your patience and understanding.</p>
        <p class="mb-4">If you want to be the first to know when these features are live, sign up for our newsletter:</p>

    </div>
    <div class="center bg-blue-500 p-4 md:p-14">
        <form class="w-full max-w-md flex flex-col gap-4 center bg-blue-500 items-center" action="" method="POST">
            @csrf
            <x-text-input type="email" name="email" placeholder="Your email address" required />
            <button class="py-2 text-blue-500 font-semibold w-full bg-white px-4 rounded-md ring" type="submit">
                Subscribe
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</x-logged-out>
