<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meghbela Digital - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 flex flex-col min-h-screen">
    <!-- Info Bar -->
    <div class="w-full bg-[#233e91] text-white">
        <div class="container mx-auto px-4 flex justify-between items-center h-12">
            <div class="flex items-center space-x-6 text-sm font-medium">
                <span>📞 1800-103-4721</span>
                <span>✉️ support@meghbeladigital.com</span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="https://example.com/customer-login" class="bg-white text-[#233e91] px-4 py-2 rounded font-semibold shadow hover:bg-gray-100 transition">Subscriber Login</a>
                <a href="https://meghbela-bcrm.magnaquest.com//Login.aspx" class="bg-white text-[#233e91] px-4 py-2 rounded font-semibold shadow hover:bg-gray-100 transition">Partner Login</a>
            </div>
        </div>
    </div>
    <!-- Header -->
    <header class="bg-blue-600 text-white">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex justify-between items-center">
                <a href="/" class="text-2xl font-bold">Meghbela Digital</a>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                    <li><a href="{{ route('packages') }}" class="hover:underline">Packages</a></li>
                    <li><a href="{{ route('trai') }}" class="hover:underline">TRAI Compliance</a></li>
                    <li><a href="{{ route('news') }}" class="hover:underline">News</a></li>
                    <li><a href="{{ route('complaint') }}" class="hover:underline">File Complaint</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10 w-full">
        <div class="container mx-auto px-4 flex flex-col md:flex-row md:justify-between md:items-start text-left space-y-8 md:space-y-0">
            <div class="md:w-1/2">
                <div class="text-2xl font-bold mb-2">Meghbela Digital</div>
                <div class="text-gray-300 text-sm max-w-md">
                    Meghbela Digital is a leading provider of cable TV and broadband services, committed to delivering high-quality entertainment and connectivity solutions. Our mission is to connect communities with reliable and affordable services, ensuring customer satisfaction at every step.
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="font-semibold mb-2 border-b border-gray-600 pb-1">Company</div>
                <ul class="space-y-2">
                    <li><a href="{{ route('channels') }}" class="hover:underline">Channel List</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:underline">Contact</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:underline">Terms & Conditions</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="{{ route('about') }}" class="hover:underline">About</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>