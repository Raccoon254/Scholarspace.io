<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Scholarspace</h3>
                <p class="text-sm text-gray-300">We offer premium essay writing services for college students. Our
                    professional writers are here to help you with your assignments.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul class="text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-500">Home</a></li>
                    <li><a href="{{ route('how-it-works') }}" class="hover:text-blue-500">How It Works</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-blue-500">Services</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-500">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-blue-500">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                <p class="text-sm flex gap-4 items-center mb-1 text-gray-300">
                    <i class="fas fa-map-marker"></i>
                    85001 Phoenix [City], Arizona [State], USA
                </p>
                <a class="text-sm flex gap-4 items-center mb-1 text-gray-300" href="tel:+254790743009">
                    <i class="fas fa-phone"></i>
                    +254 790 743 009
                </a>
                <p class="text-sm flex gap-4 items-center mb-1 text-gray-300"> <i class="fas fa-envelope"></i>
                    <a href="mailto:tomsteve187@gmail.com" class="hover:text-blue-500">hello@scholarspace.io</a>
                </p>
                <p class="text-sm flex gap-4 items-center mb-1 text-gray-300">
                    <i class="fas fa-clock"></i>
                    Available 24/7
                </p>
                <a class="btn btn-sm ring mt-4" href="https://wa.me/254790743009?text=Hello%20Scholarspace\n I%20need%20help%20with%20my%20assignment">
                    <i class="fab fa-whatsapp"></i>
                    Chat with us
                </a>
            </div>
        </div>
    </div>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HREX4BCHME"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HREX4BCHME');
    </script>
</footer>
