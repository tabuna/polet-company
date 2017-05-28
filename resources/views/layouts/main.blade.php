@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-md m-b-xxl">

            <div class="col-md-3 col-md-offset-2">

                <nav class="navi clearfix  wrapper-sm">
                    <ul class="nav">
                        <li>
                            <a href="#ru/profile/liked">
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
                        <li>
                            <a href="#ru/profile/comments">
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
                        <li>
                            <a href="#">
                                <i class="icon-settings"></i>
                                <span>Настройки</span>
                            </a>
                        </li>
                    </ul>
                </nav>


            </div>

            <div class="col-md-6">
               @yield('main')
            </div>
        </div>
    </div>
@endsection
