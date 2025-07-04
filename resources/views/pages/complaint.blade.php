@extends('layouts.main')

@section('title', 'File a Complaint')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">File a Complaint</h1>
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('complaint.store') }}" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" required>
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" required>
            @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="w-full border rounded p-2" required>
            @error('phone') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="complaint" class="block text-sm font-medium text-gray-700">Complaint</label>
            <textarea name="complaint" id="complaint" class="w-full border rounded p-2" rows="5" required></textarea>
            @error('complaint') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="captcha" class="block text-sm font-medium text-gray-700">CAPTCHA</label>
            {!! captcha_img() !!}
            <input type="text" name="captcha" id="captcha" class="w-full border rounded p-2 mt-2" required>
            @error('captcha') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Submit Complaint</button>
    </form>
@endsection