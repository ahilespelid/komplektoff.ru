@extends('layouts.app')
@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl mb-4">Вход</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded" required>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Пароль</label>
                <input type="password" name="password" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-2 rounded w-full">Войти</button>
        </form>
    </div>
@endsection