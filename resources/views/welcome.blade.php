<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title> {{--Это место которое принимает тайтл--}}

        <!-- Fonts -->
        <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet">
        <script src="{{asset('public/assets/js/bootstrap.bundle.js')}}"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('main')}}">Фаст фуд</a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('main')}}">Главная страница</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('menu')}}">Меню</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('basket')}}">Заказы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('newBasket')}}">Корзина</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                            </li>
                            @if(auth()->user()->role=="Администратор")
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Админ-панель
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('admin.tovar.index')}}">Товары</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.orders')}}">Заказы</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Пользователи</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content') {{-- поле контента--}}
        {{-- Подключение js--}}
    @stack('script')
    </body>
</html>
