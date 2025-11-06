<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>komplektoff_54</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('orders.index') }}" class="font-bold">komplektoff_54</a>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:underline">Выйти</button>
                </form>
            @endauth
            @guest
                <div>
                    <a href="{{ route('login') }}" class="mr-4 hover:underline">Вход</a>
                    <a href="{{ route('register') }}" class="hover:underline">Регистрация</a>
                </div>
            @endguest
        </div>
    </nav>
    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>