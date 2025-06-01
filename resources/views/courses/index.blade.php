@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Все курсы</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($courses as $course)
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">{{ $course->title }}</h2>
                <p class="text-gray-700 mb-4">{{ $course->description }}</p>
                <p class="text-blue-600 font-bold">${{ number_format($course->price, 2) }}</p>
                <p class="text-sm text-gray-500">Instructor: {{ $course->instructor->name }}</p>
            </div>
        @endforeach
    </div>
@endsection
