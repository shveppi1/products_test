@extends('layout.auth')


@section('content')
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4">Авторизация</h1>
        <form action="{{ route('auth.sessions.store') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input name="email" type="email" id="email" class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Введите ваш email">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Пароль</label>
                <input name="password" type="password" id="password" class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Введите ваш пароль">
            </div>

            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Запомнить меня</label>
            </div>

            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Войти</button>
        </form>

        @if($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>


@endsection
