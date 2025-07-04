@extends('layouts.admin')

@section('title', 'LCN Master')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-6xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-center">LCN Master</h2>
            <a href="{{ route('admin.lcnmaster.downloadExcel') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">Download Excel</a>
        </div>
        <div class="overflow-x-auto rounded shadow">
            <table class="min-w-full table-auto text-left border border-gray-200 bg-white">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b font-semibold">Genre</th>
                        <th class="px-6 py-3 border-b font-semibold">LCN</th>
                        <th class="px-6 py-3 border-b font-semibold">SID</th>
                        <th class="px-6 py-3 border-b font-semibold">Freq</th>
                        <th class="px-6 py-3 border-b font-semibold">Channel</th>
                        <th class="px-6 py-3 border-b font-semibold text-center" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($channels as $row)
                        <tr class="@if($loop->odd) bg-gray-50 @endif hover:bg-blue-50 transition">
                            <td class="px-6 py-3 border-b">{{ $row->lcnRelation->genre ?? '' }}</td>
                            <td class="px-6 py-3 border-b">{{ $row->lcn }}</td>
                            <td class="px-6 py-3 border-b">{{ $row->sid }}</td>
                            <td class="px-6 py-3 border-b">{{ $row->sidInfo->freq ?? '' }}</td>
                            <td class="px-6 py-3 border-b font-semibold">{{ $row->channel }}</td>
                            <td class="px-4 py-3 border-b text-center">
                                <a href="{{ url('admin/lcnmaster/edit/'.$row->sid) }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 border border-yellow-500 font-semibold px-3 py-1 rounded mr-1 transition">Edit</a>
                            </td>
                            <td class="px-4 py-3 border-b text-center">
                                <a href="{{ url('admin/lcnmaster/update/'.$row->sid) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white border border-blue-700 font-semibold px-3 py-1 rounded mr-1 transition">Update</a>
                            </td>
                            <td class="px-4 py-3 border-b text-center">
                                <form action="{{ url('admin/lcnmaster/delete/'.$row->sid) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection