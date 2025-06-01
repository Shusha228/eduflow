@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">New Password</label>
            <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="avatar" class="block text-gray-700">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="w-full px-4 py-2 border rounded-lg">
            @if(auth()->user()->avatar)
                <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="Avatar" class="mt-2 w-20 h-20 rounded-full">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update Profile</button>
    </form>
@endsection
