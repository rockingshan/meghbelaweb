<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden md:flex flex-col">
        <div class="h-16 flex items-center justify-center bg-red-700 text-2xl font-bold tracking-wide">Admin Panel</div>
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('admin.index') }}" class="block px-4 py-2 rounded hover:bg-red-700 {{ request()->routeIs('admin.index') ? 'bg-red-800' : '' }}">Dashboard</a>
            <a href="{{ route('admin.posts.index') }}" class="block px-4 py-2 rounded hover:bg-red-700 {{ request()->routeIs('admin.posts.*') ? 'bg-red-800' : '' }}">Manage Posts</a>
            <a href="{{ route('admin.complaints') }}" class="block px-4 py-2 rounded hover:bg-red-700 {{ request()->routeIs('admin.complaints') ? 'bg-red-800' : '' }}">Complaints</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-8">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-700">Logout</button>
            </form>
        </nav>
    </aside>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-red-700 text-white h-16 flex items-center px-6 shadow">
            <h1 class="text-2xl font-bold">@yield('title', 'Admin Dashboard')</h1>
        </header>
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html> 