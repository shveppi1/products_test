<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/js/iziModal.min.js"></script>


    @vite(['resources/css/app.scss', 'resources/css/iziModal.css'])

    <script>
        dataDetail = {};
    </script>
</head>
<body>


<div class="sidebar">

    <div class="sidebar-header">
        <a href="/" class="sidebar-logo">
            <div class="logo"><img src="/images/logo.png" alt=""></div>
            <span>Interprise Resource Planning</span>
        </a>
    </div>

    <div class="sidebar-body py-8 px-5">
        <ul class="sidebar-menu">
            <li><a href="/products">Продукты</a></li>
        </ul>
    </div>

</div>


<div class="header-main flex justify-between px-6">
    <div class="title_page">
        @yield('h1', 'Главная')
    </div>

    <div class="login">
        @guest
            <a href="{{route('auth.sessions.create')}}">Войти</a>
        @endguest
        @auth
            <div class="flex">
                <span class="mr-4">{{ auth()->user()->name}}</span>

            <form action="{{route('auth.sessions.destroy')}}"
                  method="post">
                @csrf
                @method('DELETE')
                <input class="cursor-pointer" type="submit" value="Выйти">
            </form>
            </div>
        @endauth
    </div>
</div>


<div class="main main-app p-2 pr-4">

    @if (session('alert'))
        <div class="p-4 mb-2 bg-slate-200 text-slate-500">
            {{ session('alert') }}
        </div>
    @endif

    @yield('content')

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

@yield('modals_form')

@vite(['resources/js/app.js'])


</body>
</html>
