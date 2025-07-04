@extends('layouts.admin')

@section('title', 'Update Channel')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6">Update Channel Details</h2>
    <form method="POST" action="{{ route('admin.lcnmaster.update.save', $channel->sid) }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Current LCN</label>
            <input type="text" value="{{ $channel->lcn }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">SID</label>
            <input type="text" value="{{ $channel->sid }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Frequency</label>
            <input type="text" value="{{ $channel->sidInfo->freq ?? '' }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Genre</label>
            <input type="text" value="{{ $channel->lcnRelation->genre ?? '' }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Channel Name</label>
            <input type="text" name="channel" value="{{ old('channel', $channel->channel) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Available LCN</label>
            <select name="lcn" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
                <option value="">Select LCN</option>
                @foreach($availableLcns as $lcn)
                    <option value="{{ $lcn->lcn }}">{{ $lcn->lcn }} || {{ $lcn->genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.lcnmaster') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection 