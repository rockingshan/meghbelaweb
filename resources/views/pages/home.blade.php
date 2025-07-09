@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <!-- Hero Section: Full-width Slideshow with Text Overlay -->
    <section class="relative w-full h-[32rem] overflow-hidden">
        <div id="hero-slideshow" class="w-full h-full relative">
            <!-- Slide 1 -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-100" style="z-index:1;">
                <img src="/hero-engineers-cable.svg" alt="Engineers installing cable" class="w-full h-full object-cover object-center" />
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Engineers at Work</h1>
                        <p class="text-xl md:text-2xl mb-8 font-medium drop-shadow">Professional installation for seamless connectivity.</p>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0" style="z-index:1;">
                <img src="/hero-cricket-crowd.svg" alt="Crowd watching cricket on big screen" class="w-full h-full object-cover object-center" />
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Cricket for Everyone</h1>
                        <p class="text-xl md:text-2xl mb-8 font-medium drop-shadow">Enjoy live sports with friends and family.</p>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0" style="z-index:1;">
                <img src="/home-cinema.svg" alt="Family watching TV together" class="w-full h-full object-cover object-center" />
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Family Entertainment</h1>
                        <p class="text-xl md:text-2xl mb-8 font-medium drop-shadow">The best TV experience for your home.</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const slides = document.querySelectorAll('#hero-slideshow .hero-slide');
                let current = 0;
                setInterval(() => {
                    slides[current].style.opacity = 0;
                    slides[current].style.zIndex = 0;
                    current = (current + 1) % slides.length;
                    slides[current].style.opacity = 1;
                    slides[current].style.zIndex = 1;
                }, 4000);
            });
        </script>
    </section>

    <!-- Services Section (Scrollable) -->
    <section class="py-16 bg-white">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Our Services</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="/cable-tv-all.svg" alt="Cable TV" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Cable TV</h3>
                <p class="text-gray-600 text-center">400+ channels with crystal-clear quality.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="/internet-services.svg" alt="Broadband" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Broadband</h3>
                <p class="text-gray-600 text-center">High-speed internet up to 1 Gbps.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="/ott-service.svg" alt="OTT Streaming" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">OTT Streaming</h3>
                <p class="text-gray-600 text-center">Access premium content on the go.</p>
            </div>
        </div>
    </section>

    <!-- Achievements Section (Scrollable) -->
    <section class="py-16 bg-gray-100">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Our Achievements</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="/awards-winner.svg" alt="Award 1" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Best Broadband Provider 2024</h3>
                <p class="text-gray-600 text-center">Recognized for outstanding service and reliability.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="/service.svg" alt="Award 2" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Top Customer Satisfaction</h3>
                <p class="text-gray-600 text-center">Awarded for exceptional customer support.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="/home-cinema.svg" alt="Milestone" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Serving 1M+ customers</h3>
                <p class="text-gray-600 text-center">A milestone in digital connectivity.</p>
            </div>
        </div>
    </section>

    <!-- Image Collage Section -->
    <section class="py-12">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Why Choose Us</h2>
        <div class="space-y-10">
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-8">
                <div class="md:w-1/3 flex justify-center">
                    <img src="/awards-winner.svg" alt="Feature 1" class="max-w-screen-sm md:w-80 rounded-lg shadow" />
                </div>
                <div class="md:w-2/3 p-4">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Reliable Connectivity</h3>
                    <p class="text-gray-600 text-lg mb-2">Experience uninterrupted broadband services with our state-of-the-art infrastructure. Our network is designed for maximum uptime and speed, ensuring you stay connected when it matters most.</p>
                    <p class="text-gray-600 text-base">We use the latest technology and have a dedicated team monitoring the network 24/7. Whether for work, study, or entertainment, you can rely on us for a seamless online experience.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row-reverse items-center gap-4 md:gap-8">
                <div class="md:w-1/3 flex justify-center">
                    <img src="/home-cinema.svg" alt="Feature 2" class="w-64 md:w-80 rounded-lg shadow" />
                </div>
                <div class="md:w-2/3 p-4">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Quality Entertainment</h3>
                    <p class="text-gray-600 text-lg mb-2">Enjoy a wide range of channels and OTT content with our premium cable TV and streaming services. We bring the best of entertainment right to your living room.</p>
                    <p class="text-gray-600 text-base">From live sports to the latest movies and shows, our packages are tailored for every member of the family. Discover new favorites and never miss a moment of the action.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-8">
                <div class="md:w-1/3 flex justify-center">
                    <img src="/service.svg" alt="Feature 3" class="w-64 md:w-80 rounded-lg shadow" />
                </div>
                <div class="md:w-2/3 p-4">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Customer Support</h3>
                    <p class="text-gray-600 text-lg mb-2">Our support team is available 24/7 to help you with any issues or questions. We pride ourselves on quick response times and effective solutions.</p>
                    <p class="text-gray-600 text-base">Reach us via phone, email, or chat. Your satisfaction is our top priority, and we go the extra mile to ensure you have a smooth experience with our services.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row-reverse items-center gap-4 md:gap-8">
                <div class="md:w-1/3 flex justify-center">
                    <img src="/payments.svg" alt="Feature 4" class="w-64 md:w-80 rounded-lg shadow" />
                </div>
                <div class="md:w-2/3 p-4">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Affordable Plans</h3>
                    <p class="text-gray-600 text-lg mb-2">Choose from a variety of packages tailored to your needs and budget. We believe in providing value without compromising on quality.</p>
                    <p class="text-gray-600 text-base">No hidden charges, transparent billing, and flexible options make it easy to find the perfect plan for your household or business.</p>
                </div>
            </div>
        </div>
    </section>
@endsection