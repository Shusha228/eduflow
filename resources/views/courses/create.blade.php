@extends('layouts.app')

@section('title', 'Создание курса')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Создать новый курс</h1>

    <form action="{{ route('courses.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Название</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Описание</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border rounded-lg" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Категория</label>
            <input type="number" name="category_id" id="category_id" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Цена</label>
            <input type="number" step="0.01" name="price" id="price" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Создать</button>
    </form>
@endsection
