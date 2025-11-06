@extends('layouts.app')
@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl mb-4">Создать заказ</h2>
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Название</label>
                <input type="text" name="title" class="w-full p-2 border rounded" required>
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Описание</label>
                <textarea name="description" class="w-full p-2 border rounded"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-2 rounded w-full">Создать</button>
        </form>
    </div>
@endsection