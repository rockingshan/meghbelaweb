@extends('layouts.admin')

@section('title', 'Change Password')

@section('content')
    <div class="bg-white p-6 shadow rounded max-w-lg mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Change Password</h2>
        @include('profile.partials.update-password-form')
    </div>
@endsection 