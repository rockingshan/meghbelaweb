@extends('layouts.main')

@section('title', $title)

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ $title }}</h1>
    @foreach ($posts as $post)
        <article class="mb-6 bg-white p-6 shadow rounded">
            <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
            <p class="text-gray-600">{{ $post->description }}</p>
            @if ($post->file_path)
                <a href="{{ Storage::url($post->file_path) }}" class="text-blue-600 hover:underline" download>Download</a>
            @endif
            <p class="text-gray-500 text-sm mt-2">Posted on {{ $post->created_at->format('M d, Y') }}</p>
        </article>
    @endforeach
    {{ $posts->links() }}
@endsection