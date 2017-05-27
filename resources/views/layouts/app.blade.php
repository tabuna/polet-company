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
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>

    <meta property="og:title" content="@yield('title',setting('site_title','')) - Лучшая база поставщиков услуг">
    <meta property="og:description" content="@yield('description',setting('site_description',''))">
    <meta property="og:type" content="article">
    <meta property="og:image" content="@yield('image', config('app.url').'/img/tour/logo.png')">
    <meta property="og:url" content="{{url()->current()}}">

    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
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

<header id="header" class="navbar bg-white padder-v">
    <div class="container">
        <div class="navbar-header">
            <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand m-r-lg"><span class="h2"><span class="text-info">Малый</span> тендер</span></a>
        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <div class="m-t-sm">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-info btn-rounded">Вход</a>
                    </div>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <div class="bg-white b-t">
        <div class="container">
            <div class="row m-t-xxl m-b-xxl">
                <div class="col-sm-3">
                    <p>[<span class="text-info">Малый </span> тендер] © {{ date('Y')  }}</p>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    @widget('footerMenu')
                </div>
                <div class="col-sm-3  col-sm-offset-2 text-right">
                    {{setting('site_phone','')}}<br>
                    {{setting('site_email','')}}
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / footer -->


<script src="/js/app.js"></script>
</body>
</html>
