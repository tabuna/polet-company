@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-md m-b-xxl">

            <div class="col-md-3">

                <div class="aside-affix2">
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

            <div class="col-md-3">
                <div class="panel panel-default b box-shadow">
                    <div class="panel-heading">
                        <div class="clearfix">
                            <div class="clear">
                                <div class="h4 m-t-xs m-b-xs">
                                    Черняев Александр
                                    <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                                </div>
                                <small class="text-muted">Представитель компании</small>
                            </div>
                        </div>
                    </div>
                    <div class="list-group no-radius alt">
                        <a class="list-group-item" href="#">
                            <i class="fa fa-comment fa-fw text-muted"></i>
                            Адрес компании
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-envelope fa-fw text-muted"></i>
                            Спрос
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-eye fa-fw text-muted"></i>
                            Проедложения
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-comment fa-fw text-muted"></i>
                            Адрес компании
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-envelope fa-fw text-muted"></i>
                            Спрос
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-eye fa-fw text-muted"></i>
                            Проедложения
                        </a>
                    </div>
                </div>


                <div class="panel wrapper-md padder-lg b box-shadow-lg text-center">
                    <p class="h3 font-thin m-b-sm">Тендер</p>
                    <p class="font-bold text-sm">Нужно выполнить работу? Объяви об этом всем</p>
                    <p class="small text-muted text-xs">Актуально до 60 дней</p>
                    <a href="#" class="btn btn-info btn-rounded">Разместить</a>
                </div>


            </div>

        </div>
    </div>
@endsection
