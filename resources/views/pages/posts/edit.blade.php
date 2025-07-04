@extends('layouts.main')

@section('title', 'Edit Post')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium">Category</label>
            <select name="category" id="category" class="w-full border rounded p-2" required>
                <option value="trai" {{ $post->category == 'trai' ? 'selected' : '' }}>TRAI Compliance</option>
                <option value="packages" {{ $post->category == 'packages' ? 'selected' : '' }}>Packages</option>
                <option value="news" {{ $post->category == 'news' ? 'selected' : '' }}>News</option>
            </select>
            @error('category') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ $post->title }}" required>
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border rounded p-2" rows="5">{{ $post->description }}</textarea>
            @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium">File (PDF)</label>
            <input type="file" name="file" id="file" class="w-full border rounded p-2" accept=".pdf">
            @if ($post->file_path)
                <p class="text-gray-600 text-sm">Current file: <a href="{{ Storage::url($post->file_path) }}" class="text-blue-600 hover:underline">Download</a></p>
            @endif
            @error('file') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Post</button>
    </form>
@endsection