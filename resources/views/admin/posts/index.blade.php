@extends('layouts.admin')

@section('title', 'Manage Posts')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Manage Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Create New Post</a>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">File</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($post->category) }}</td>
                        <td class="border px-4 py-2">{{ $post->description }}</td>
                        <td class="border px-4 py-2">
                            @if ($post->file_path)
                                <a href="{{ Storage::url($post->file_path) }}" class="text-blue-600 hover:underline" download>Download</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $post->created_at->format('M d, Y') }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 