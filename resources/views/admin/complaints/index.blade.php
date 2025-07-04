@extends('layouts.admin')

@section('title', $title ?? 'Customer Complaints')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ $title ?? 'Customer Complaints' }}</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Complaint</th>
                    <th class="px-4 py-2">Submitted At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complaints as $complaint)
                    <tr>
                        <td class="border px-4 py-2">{{ $complaint->name }}</td>
                        <td class="border px-4 py-2">{{ $complaint->email }}</td>
                        <td class="border px-4 py-2">{{ $complaint->phone }}</td>
                        <td class="border px-4 py-2">{{ $complaint->complaint }}</td>
                        <td class="border px-4 py-2">{{ $complaint->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $complaints->links() }}
    </div>
@endsection 