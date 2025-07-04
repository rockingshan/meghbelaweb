@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <!-- Hero Section with Slideshow -->
    <section class="relative h-[32rem]">
        <div class="absolute inset-0">
            <div id="hero-slideshow" class="w-full h-full">
                <div class="hero-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100" style="background-image: url('https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=1200&q=80');"></div>
                <div class="hero-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80');"></div>
                <div class="hero-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url('https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=1200&q=80');"></div>
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white">
                    <h1 class="text-5xl font-extrabold mb-4 drop-shadow-lg">Welcome to Meghbela Digital</h1>
                    <p class="text-2xl mb-8 font-medium drop-shadow">Your trusted partner for high-speed broadband and cable TV services.</p>
                    <a href="{{ route('packages') }}" class="bg-yellow-400 text-blue-900 px-8 py-4 rounded-lg text-lg font-bold shadow hover:bg-yellow-500 transition">View Packages</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('#hero-slideshow .hero-slide');
            let current = 0;
            setInterval(() => {
                slides[current].style.opacity = 0;
                current = (current + 1) % slides.length;
                slides[current].style.opacity = 1;
            }, 4000);
        });
    </script>

    <!-- Services Section (Scrollable) -->
    <section class="py-16 bg-white">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Our Services</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="Cable TV" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Cable TV</h3>
                <p class="text-gray-600 text-center">100+ channels with crystal-clear quality.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Broadband" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Broadband</h3>
                <p class="text-gray-600 text-center">High-speed internet up to 1 Gbps.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="OTT Streaming" class="w-full h-40 object-cover mb-4 rounded">
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
                <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="Award 1" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Best Broadband Provider 2024</h3>
                <p class="text-gray-600 text-center">Recognized for outstanding service and reliability.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Award 2" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Top Customer Satisfaction</h3>
                <p class="text-gray-600 text-center">Awarded for exceptional customer support.</p>
            </div>
            <div class="w-80 bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="Milestone" class="w-full h-40 object-cover mb-4 rounded">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Serving 1M+ customers</h3>
                <p class="text-gray-600 text-center">A milestone in digital connectivity.</p>
            </div>
        </div>
    </section>

    <!-- Image Collage Section -->
    <section class="py-16">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Why Choose Us</h2>
        <div class="space-y-16">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Feature 1" class="w-full rounded-lg shadow">
                </div>
                <div class="md:w-1/2 p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Reliable Connectivity</h3>
                    <p class="text-gray-600 text-lg">Experience uninterrupted broadband services with our state-of-the-art infrastructure.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row-reverse items-center gap-8">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80" alt="Feature 2" class="w-full rounded-lg shadow">
                </div>
                <div class="md:w-1/2 p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Quality Entertainment</h3>
                    <p class="text-gray-600 text-lg">Enjoy a wide range of channels with our premium cable TV services.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" alt="Feature 3" class="w-full rounded-lg shadow">
                </div>
                <div class="md:w-1/2 p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Customer Support</h3>
                    <p class="text-gray-600 text-lg">24/7 support to ensure your queries are resolved promptly.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row-reverse items-center gap-8">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Feature 4" class="w-full rounded-lg shadow">
                </div>
                <div class="md:w-1/2 p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Affordable Plans</h3>
                    <p class="text-gray-600 text-lg">Choose from a variety of packages tailored to your needs.</p>
                </div>
            </div>
        </div>
    </section>
@endsection