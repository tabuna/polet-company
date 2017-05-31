@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-md m-b-xxl">

            <div class="col-md-3 col-md-offset-2">

                <div class="aside-affix">
                    <nav class="navi clearfix  wrapper-sm">
                        <ul class="nav">
                            <li class="hidden-folded text-muted padder m-t m-b-sm text-xs">
                                <span class="">Функции</span>
                            </li>

                            <li class="{{active('home')}}">
                                <a href="{{route('profile',Auth::user()->id)}}">
                                    <i class="icon-home"></i>
                                    <span>Профиль</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-briefcase"></i>
                                    <span>Тендеры</span>
                                    <span class="badge pull-right bg-info">4</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-bubbles"></i>
                                    <span>Сообщения</span>
                                    <span class="badge pull-right bg-info">4</span>
                                </a>
                            </li>
                            <li class="{{active('profile.fave')}}">
                                <a href="{{route('profile.fave')}}">
                                    <i class="icon-star"></i>
                                    <span>Избранное</span>
                                </a>
                            </li>
                            <li class="hidden-folded text-muted padder m-t m-b-sm text-xs">
                                <span class="">Общие настройки</span>
                            </li>
                            <li>
                                <a href="#ru/profile">
                                    <i class="icon-credit-card"></i>
                                    <span>Платежи</span>
                                </a>
                            </li>
                            <li>
                                <a href="#ru/profile/password">
                                    <i class="icon-chart"></i>
                                    <span>Статистика</span>
                                </a>
                            </li>
                            <li class="{{active('profile.edit')}}">
                                <a href="{{route('profile.edit')}}">
                                    <i class="icon-settings"></i>
                                    <span>Настройки</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav">

                            <li class="hidden-folded text-muted padder m-t m-b-sm text-xs">
                                <span class="">Управление</span>
                            </li>


                            @if(Auth::user()->hasAccess('dashboard.index'))
                                <li>
                                    <a href="{{url('/dashboard')}}" title="Коммандная панель">
                                        <i class="icon-speedometer"></i>
                                        <span>Администрирование</span>
                                    </a>
                                </li>
                            @endif

                            <li class="disabled" title="Данная функция временно не доступна">
                                <a href="#">
                                    <i class="icon-support"></i>
                                    <span>Помощь</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i>
                                    <span>Выйти</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </li>


                        </ul>


                    </nav>

                    </nav>
                </div>

            </div>

            <div class="col-md-6">
                @yield('main')
            </div>
        </div>
    </div>
@endsection
