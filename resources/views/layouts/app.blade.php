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

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>

    <meta property="og:title" content="@yield('title',setting('site_title','')) - Лучшая база поставщиков услуг">
    <meta property="og:description" content="@yield('description',setting('site_description',''))">
    <meta property="og:type" content="article">
    <meta property="og:image" content="@yield('image', config('app.url').'/img/tour/logo.png')">
    <meta property="og:url" content="{{url()->current()}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::id() }}">


    <link rel="shortcut icon" type="image/png" href="/img/logo.png">

    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#58666e">
    <meta name="theme-color" content="#f1f3f5">
    @stack('stylesheet')
</head>
<body>

<header id="header" class="navbar bg-white padder-v b-b">
    <div class="container">
        <div class="navbar-header">
            <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand m-r-lg">
                <img src="/img/logo.png" class="img-responsive m-r-xs">
                <span class="h4 text-black">
                    Малый тендер
                </span></a>
        </div>
        <div class="collapse navbar-collapse">


            @if (Auth::guest())
            <ul class="nav navbar-nav">
                <li>
                    <a href="#what" data-ride="scroll">Предоставляю услуги</a>
                </li>
                <li>
                    <a href="#why" data-ride="scroll">Ищу заказы</a>
                </li>
                <li>
                    <a href="#features" data-ride="scroll">Помощь</a>
                </li>
                <li>
                    <a href="#features" data-ride="scroll">Цены</a>
                </li>
                <li>
                    <a href="#">Компании</a>
                </li>
            </ul>
            @else

                <form class="navbar-form navbar-form-sm navbar-left shift" data-target=".navbar-collapse" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm bg-light no-border rounded padder"
                                   placeholder="Поиск ...">
                            <span class="input-group-btn">
                <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
              </span>
                        </div>
                    </div>
                </form>
            @endif





            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <div class="m-t-sm">
                        <a href="{{ route('login') }}" class="btn btn-link btn-sm">Вход </a> или
                        <a href="{{route('register')}}" class="btn btn-sm btn-info btn-rounded m-l"><strong>Зарегистрироваться</strong></a>
                    </div>

                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                           title="Мой профиль">
                            {{ Auth::user()->name }}
                            <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
<img src="{{Auth::user()->getAvatar()}}" alt="{{ Auth::user()->name }}">
<i class="on md b-white bottom"></i>
</span>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{route('profile',Auth::user()->id)}}">Профиль</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{route('profile.password')}}">Сменить пароль</a>
                            </li>
                            <li>
                                <a href="{{route('profile.edit')}}">Редактировать</a>
                            </li>
                            <li>
                                <a href="#">Помощь</a>
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


<!-- footer -->
<footer id="footer">
    @yield('footer')

    <section class="bg-white b-t">
        <div class="container">
            <div class="row m-t-xl m-b-xl">
                <div class="col-sm-6">
                    <span class="h4 text-black">[<span class="text-info">Малый </span> тендер]</span>
                    <div class="m-t text-xs">
                        <ul class="list-inline">
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li><a href="#">Работа</a></li>
                            <li><a href="#">Договор оферты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <p class="text-xs">
                        Не следует, однако забывать, что начало повседневной работы по формированию позиции
                    </p>
                    <p class="text-xs text-muted">Copyright © {{date('Y')}} ООО "Русский паллет". Все права
                        защищены.</p>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- / footer -->


<script src="/js/app.js"></script>
</body>
</html>
