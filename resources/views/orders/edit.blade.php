@extends('layouts.app')
@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl mb-4">Редактировать заказ</h2>
        <form method="POST" action="{{ route('orders.update', $order) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Название</label>
                <input type="text" name="title" value="{{ $order->title }}" class="w-full p-2 border rounded" required>
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Описание</label>
                <textarea name="description" class="w-full p-2 border rounded">{{ $order->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Статус</label>
                <select name="status" class="w-full p-2 border rounded">
                    <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                    <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>В процессе</option>
                    <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Завершен</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-2 rounded w-full">Сохранить</button>
        </form>
    </div>
@endsection