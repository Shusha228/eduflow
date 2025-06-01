@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Login</h1>

    <form action="{{ route('login') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Login</button>
    </form>
@endsection
