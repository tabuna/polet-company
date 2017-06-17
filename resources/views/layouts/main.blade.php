@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <div class="row m-t-md m-b-xxl">


            <div class="col-md-8">
                        @yield('main')
            </div>


            <div class="col-md-4">
                <div class="panel panel-default b">
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


                        <router-link :to="{ name: 'profile', params: { id: user.id }}" class="list-group-item">
                            <i class="icon-home m-r-xs"></i>
                            <span>Профиль</span>
                        </router-link>

                        <router-link :to="{ name: 'tender'}" class="list-group-item">
                            <i class="icon-briefcase m-r-xs"></i>
                            <span>Тендеры</span>
                        </router-link>

                        <a href="#" class="list-group-item">
                            <i class="icon-bubbles m-r-xs"></i>
                            <span>Сообщения</span>
                            <span class="badge pull-right bg-info">4</span>
                        </a>

                        <router-link :to="{ name: 'fave'}" class="list-group-item">
                            <i class="icon-star m-r-xs"></i>
                            <span>Избранное</span>
                        </router-link>

                        <router-link :to="{ name: 'payments'}" class="list-group-item">
                            <i class="icon-credit-card m-r-xs"></i>
                            <span>Платежи</span>
                        </router-link>

                        <a href="#ru/profile/password" class="list-group-item">
                            <i class="icon-chart m-r-xs"></i>
                            <span>Статистика</span>
                        </a>


                        <router-link :to="{ name: 'edit' }" class="list-group-item">
                            <i class="icon-settings m-r-xs"></i>
                            <span>Настройки</span>
                        </router-link>

                    </div>
                </div>


                <div class="panel wrapper-xl b text-center">
                    <p class="h3 font-thin m-b-sm">Тендер</p>
                    <p class="font-bold text-sm">Нужно выполнить работу? Объяви об этом всем</p>
                    <p class="small text-muted text-xs">Актуально до 60 дней</p>
                    <router-link class="btn btn-info btn-rounded" :to="{ name: 'tender.create'}">Разместить
                    </router-link>
                </div>


            </div>


        </div>
    </div>
@endsection
