<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title',setting('site_title','')) - Лучшая база поставщиков услуг</title>
    <meta name="description" content="@yield('description',setting('site_description',''))">
    <meta name="keywords" content="@yield('keywords',setting('site_keywords',''))">

    <meta http-equiv="X-DNS-Prefetch-Control" content="on">
    <link rel="dns-prefetch" href="{{ config('app.url') }}">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://maps.googleapis.com">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#057494">
    <meta name="msapplication-TileColor" content="#eeffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="{{ mix('/css/app.css')}}" type="text/css"/>

    <meta property="og:title" content="@yield('title',setting('site_title','')) - Лучшая база поставщиков услуг">
    <meta property="og:description" content="@yield('description',setting('site_description',''))">
    <meta property="og:type" content="article">
    <meta property="og:image" content="@yield('image', config('app.url').'/img/tour/logo.png')">
    <meta property="og:url" content="{{url()->current()}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::id() }}">
    @stack('stylesheet')
</head>
<body>

<div id="app" class="app">
    <header id="header" class="navbar bg-white padder-v b-b">
        <div class="container">
            <div class="navbar-header">
                <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                @if (Auth::guest())
                    <a href="{{ url('/') }}" class="navbar-brand m-r-lg">
                        <img src="/img/sign3.svg" class="img-responsive m-r" height="30px">
                        <span class="h4 text-black">
                            <span>Uniten</span>
                            <small>Единая бизнес система</small>
                        </span>
                    </a>
                @else

                    <router-link :to="{ name: 'profile', params: { id: user.id }}" class="navbar-brand m-r-lg" style="height: 30px">
                        <img src="/img/sign3.svg" class="img-responsive m-r-xs" height="30px">
                        <span class="h4 text-black">
                            <span>Uniten</span>
                            <small>Единая система тендеров</small>
                        </span>
                    </router-link>

                @endif
            </div>
            <div class="collapse navbar-collapse">


                @if (Auth::guest())
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/companies">Предоставляю услуги</a>
                        </li>
                        <li>
                            <a href="/order">Ищу заказы</a>
                        </li>
                    </ul>
                @else

                    <ul class="nav navbar-nav">
                        <li>
                            <router-link :to="{ name: 'needs'}">Мой спрос</router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'offer'}">Мои предложения</router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'recommended'}">Мои рекомендации</router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'tender'}">Тендеры</router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'companies'}">Компании</router-link>
                        </li>
                    </ul>
                @endif


                <ul class="nav navbar-nav navbar-right text-center-xs">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <div class="m-t-sm">
                            <a href="{{ route('login') }}" class="btn btn-link btn-sm">Вход </a> или
                            <a href="{{route('register')}}" class="btn btn-sm btn-info btn-rounded m-l"><strong>Зарегистрироваться</strong></a>
                        </div>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"
                               title="Мой профиль">
                               {{ Auth::user()->name }}
                                <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
<img src="{{Auth::user()->getAvatar()}}" clas="b" alt="{{ Auth::user()->name }}">
<i class="on md b-white bottom"></i>
</span>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <router-link :to="{ name: 'profile', params: { id: user.id }}">Профиль</router-link>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <router-link :to="{ name: 'password' }">Сменить пароль</router-link>
                                </li>
                                <li>
                                    <router-link :to="{ name: 'edit' }">Настройки</router-link>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </header>


    <div id="content">

        @yield('content')


    </div>

</div>


<!-- footer -->
<footer id="footer">
    @yield('footer')

    <section class="bg-white b-t">
        <div class="container">
            <div class="row m-t-xl m-b-xl">
                <div class="col-md-6 hidden-xs">
                    <div class="text-xs">
                        <ul class="list-inline">
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li><a href="#">Работа</a></li>
                            <li><a href="#">Договор оферты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-md-12 text-right">
                    <p class="text-xs text-muted">Copyright © {{date('Y')}} ООО "Русский паллет". Все права
                                                  защищены.</p>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- / footer -->

<script src="{{ mix('/js/app.js')}}"></script>
</body>
</html>
