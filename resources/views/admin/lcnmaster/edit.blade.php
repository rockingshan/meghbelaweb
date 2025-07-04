@extends('layouts.admin')

@section('title', 'Edit Channel Name')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-xl font-bold mb-4">Edit Channel Name</h2>
        <form method="POST" action="{{ route('admin.lcnmaster.edit.save', $channel->sid) }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Channel Name</label>
                <input type="text" name="channel" value="{{ old('channel', $channel->channel) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
            </div>
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.lcnmaster') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection 