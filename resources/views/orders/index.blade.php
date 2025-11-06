@extends('layouts.app')
@section('content')
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between mb-4">
            <h2 class="text-2xl">Мои заказы</h2>
            <a href="{{ route('orders.create') }}" class="bg-blue-600 text-white p-2 rounded">Создать заказ</a>
        </div>
        <form method="GET" class="mb-4">
            <label class="mr-2">Фильтр по статусу:</label>
            <select name="status" onchange="this.form.submit()" class="p-2 border rounded">
                <option value="">Все</option>
                <option value="new" {{ $status == 'new' ? 'selected' : '' }}>Новый</option>
                <option value="in_progress" {{ $status == 'in_progress' ? 'selected' : '' }}>В процессе</option>
                <option value="done" {{ $status == 'done' ? 'selected' : '' }}>Завершен</option>
            </select>
        </form>
        @if($orders->isEmpty())
            <p class="text-gray-500">Заказы отсутствуют</p>
        @else
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Название</th>
                        <th class="p-2">Описание</th>
                        <th class="p-2">Статус</th>
                        <th class="p-2">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b">
                            <td class="p-2">{{ $order->title }}</td>
                            <td class="p-2">{{ $order->description ?? '-' }}</td>
                            <td class="p-2">{{ $order->status == 'new' ? 'Новый' : ($order->status == 'in_progress' ? 'В процессе' : 'Завершен') }}</td>
                            <td class="p-2">
                                <a href="{{ route('orders.edit', $order) }}" class="text-blue-600 hover:underline">Редактировать</a>
                                <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Удалить заказ?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection