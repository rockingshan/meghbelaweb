@extends('layouts.main')

@section('title', 'Packages')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Packages</h1>
    <div class="space-y-6">
        @foreach ($posts as $post)
            <div class="bg-white p-6 shadow rounded flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                    <p class="text-gray-600 mt-2">{{ $post->description }}</p>
                </div>
                @if ($post->file_path)
                    <a href="{{ Storage::url($post->file_path) }}" class="ml-6 text-blue-600 hover:text-blue-800 flex items-center" download title="Download File">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                        </svg>
                        <span class="ml-2 font-medium">Download</span>
                    </a>
                @endif
            </div>
        @endforeach
    </div>
@endsection 