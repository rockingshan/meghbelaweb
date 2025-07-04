@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Create Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium">Category</label>
            <select name="category" id="category" class="w-full border rounded p-2" required>
                <option value="trai">TRAI Compliance</option>
                <option value="package">Packages</option>
                <option value="news">News</option>
            </select>
            @error('category') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" required>
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border rounded p-2" rows="5"></textarea>
            @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium">File (PDF)</label>
            <input type="file" name="file" id="file" class="w-full border rounded p-2" accept=".pdf">
            @error('file') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Create Post</button>
    </form>
@endsection 