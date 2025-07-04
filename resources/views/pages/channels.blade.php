@extends('layouts.main')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-4xl">
        <h2 class="text-2xl font-bold text-center mb-6">Channel List</h2>
        <div class="mb-4 flex justify-end">
            <input type="text" id="channelSearch" placeholder="Search channels..." class="border border-gray-300 rounded px-3 py-2 w-full max-w-xs focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div class="overflow-x-auto rounded shadow">
            <table id="channelTable" class="min-w-full table-auto text-left border border-gray-200 bg-white">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b font-semibold">Genre</th>
                        <th class="px-6 py-3 border-b font-semibold">LCN</th>
                        <th class="px-6 py-3 border-b font-semibold">Channel Name</th>
                        <th class="px-6 py-3 border-b font-semibold">Broadcaster</th>
                        <th class="px-6 py-3 border-b font-semibold">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($channels as $row)
                        <tr class="@if($loop->odd) bg-gray-50 @endif hover:bg-blue-50 transition">
                            <td class="px-6 py-3 border-b">{{ $row->genre }}</td>
                            <td class="px-6 py-3 border-b">{{ $row->lcn }}</td>
                            <td class="px-6 py-3 border-b font-semibold">{{ $row->channelName }}</td>
                            <td class="px-6 py-3 border-b">{{ $row->broadcaster }}</td>
                            <td class="px-6 py-3 border-b">{{ $row->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('channelSearch');
                const table = document.getElementById('channelTable');
                searchInput.addEventListener('keyup', function() {
                    const filter = searchInput.value.toLowerCase();
                    const rows = table.getElementsByTagName('tr');
                    for (let i = 1; i < rows.length; i++) { // skip header row
                        let rowText = rows[i].textContent.toLowerCase();
                        rows[i].style.display = rowText.includes(filter) ? '' : 'none';
                    }
                });
            });
        </script>
    </div>
</div>
@endsection
