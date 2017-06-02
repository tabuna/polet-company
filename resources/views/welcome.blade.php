@extends('layouts.app')

@section('content')


    <div class="bg-black-opacity">


        <section class="container-fluid">
            <div class="row">
                <div style="background:url(https://www.cssigniter.com/themeforest/specialty/images/hero-1.jpg) center center; background-size:cover">
                    <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                        <div class="row  m-t-xxl m-b-xxl">
                            <div class="container m-t-md top-desc-block">

                                <div class="col-xs-12">
                                    <div class="page-hero-content">
                                        <h1 class="text-white">
                                            <span class="text-info">Бизнес сеть.</span> Найди партнёра <br>
                                            о котором всегда хотел.
                                        </h1>
                                        <p class="text-white">
                                            <span class="text-info">405</span> новых предприятий за последние
                                            <span class="text-info">7</span> дней. Ищи сейчас.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <div class="container hidden">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="padder-v">
                        <h2 class="font-thin text-info l-h-1x m-t-md padder-v">
                            База проверенных поставщиков и услуг
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row v-center">
                <div class="col-md-7  text-center">
                    <img src="/img/image-top.png" class="img-responsive center">
                </div>
                <div class="col-md-5 ">
                    <p class="text-lg l-h-2x">
                        <span class="text-info">ИМЯ</span> сайта разработан для частных лиц, фирм
                        и предприятий, находящихся в поиске способов реализаций своих товаров и услуг через надёждных посредников. Используйте систему бесплатно до 1.09.2017 в рамках полнофункционального пробного периода
                    </p>
                    <p class="text-center">
                        <a href="{{ route('login') }}" class="btn btn-lg btn-default btn-rounded btn-info">Пробный
                            период</a>
                    </p>
                </div>
            </div>
        </div>


        <div class="bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="padder-v m-t-md">
                            <h4 class="m-b-n">Запустите свой бизнес по новому</h4>
                            <h1 class="font-thin m-t-n l-h-1x padder-v text-black">
                                Наши преимущества станут вашими
                            </h1>
                            <p class="text-muted">Наша давняя мечта была обойти обычную приборную панель администратора
                                <br> структуру, и двигаться вперед с простой рамкой
                            </p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 text-center">
                        <i class="m-t-md m-b-xl icon-arrow-down-circle fa-2x text-muted"></i>
                    </div>
                </div>


                <div class="row m-b-xl m-t-xl v-center">
                    <div class="col-md-6 ">
                        <p class="h1 font-thin text-black">
                            <span class="text-info">01</span>
                            <br>
                            Интуитивная система<br>
                            поиска
                        </p>


                        <ul class="list-group no-bg no-borders pull-in m-t-lg basic-list-blue">
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                «Умные» теги
                            </li>
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Простая сортировка стоимости товаров и услуг
                            </li>
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Обнаружение ближайших контрагентов, соответсвующих вашим запросам
                            </li>
                        </ul>


                    </div>
                    <div class="col-md-6  text-center">
                        <img src="/img/image-01.png" class="img-responsive center">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 text-center">
                        <i class="icon-arrow-down-circle fa-2x text-muted"></i>
                    </div>
                </div>

                <div class="row m-b-xl m-t-xxl v-center">
                    <div class="col-md-6  text-center">
                        <img src="/img/image-02.png" class="img-responsive center">
                    </div>
                    <div class="col-md-6 ">
                        <p class="h1 font-thin text-black">
                            <span class="text-info">02</span>
                            <br>
                            Доступ ко всей<br>
                            необходимой информации
                        </p>


                        <ul class="list-group no-bg no-borders pull-in m-t-lg">
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Подробная информация о контрагентах
                            </li>
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Проверенные, честные отзывы
                            </li>
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Точные цены на товары и услуги
                            </li>
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Система мгновенных сообщений с расширенным
                                функционалом
                            </li>
                        </ul>


                        <p class="text-center m-t-md">
                            <a href="#" class="btn btn-info btn-rounded">
                                Посмотерть тендеры
                            </a>
                        </p>


                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 text-center">
                        <i class="m-t-md m-b-xl icon-arrow-down-circle fa-2x text-muted"></i>
                    </div>
                </div>

                <div class="row m-b-xxl m-t-xxl v-center">
                    <div class="col-md-6 ">
                        <p class="h1 font-thin text-black">
                            <span class="text-info">03</span>
                            <br>
                            Гибкая и простая<br>
                            система оплаты
                        </p>


                        <ul class="list-group no-bg no-borders pull-in m-t-lg">
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Мониторинг произведённых транзакций
                            </li>
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Возможность оплаты через сервис «Яндекс. Касса»
                            </li>
                            <li class="list-group-item">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                1000 руб/месяц
                            </li>
                        </ul>


                    </div>
                    <div class="col-md-6  text-center">
                        <img src="/img/image-03.png" class="img-responsive center">
                    </div>
                </div>


            </div>
        </div>



        @endsection

        @section('footer2')







            <div class="container-fluid m-t-xxl">

                <div class="row">

                    <div class="container">


                        <div class="row wrapper-lg">
                            <div class="col-md-10 col-md-offset-1">
                                <p class="h1 font-thin">Our <span class="text-info">Services</span></p>

                                <div class="col-md-6 pull-in m-t-md">
                                    <small>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis .
                                    </small>
                                </div>
                            </div>
                        </div>


                        <div class="row wrapper-lg hidden">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-while b-light">
                                            <div class="panel-hover-2">
                                                <a href="#" class="block">
                                                    <div class="panel-hover-icon col-md-3">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                    <div class="col-md-9 wrapper-lg">
                                                        <div class="panel-hover-title b-b">
                                                            <p class="h4 m-b-md m-l-md">Dolor sit amet</p>
                                                        </div>
                                                        <div class="panel-hover-body">
                                                            <p class="small">
                                                                -orem ipsum dolor sit amet
                                                                -consectetur adipisicing elit
                                                                -sed do eiusmod tempor
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-while b-light">
                                            <div class="panel-hover-2">
                                                <a href="#" class="block">
                                                    <div class="panel-hover-icon col-md-3">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                    <div class="col-md-9 wrapper-lg">
                                                        <div class="panel-hover-title b-b">
                                                            <p class="h4 m-b-md m-l-md">Dolor sit amet</p>
                                                        </div>
                                                        <div class="panel-hover-body">
                                                            <p class="small">
                                                                -orem ipsum dolor sit amet
                                                                -consectetur adipisicing elit
                                                                -sed do eiusmod tempor
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-while b-light">
                                            <div class="panel-hover-2">
                                                <a href="#" class="block">
                                                    <div class="panel-hover-icon col-md-3">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                    <div class="col-md-9 wrapper-lg">
                                                        <div class="panel-hover-title b-b">
                                                            <p class="h4 m-b-md m-l-md">Dolor sit amet</p>
                                                        </div>
                                                        <div class="panel-hover-body">
                                                            <p class="small">
                                                                -orem ipsum dolor sit amet
                                                                -consectetur adipisicing elit
                                                                -sed do eiusmod tempor
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row wrapper-lg hidden">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-while b-light m-n">
                                            <div class="panel-hover">
                                                <a href="#" class="block wrapper-lg">
                                                    <div class="panel-hover-title b-b">
                                                        <p class="h4">Peerage of England</p>
                                                    </div>
                                                    <div class="panel-hover-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis .</p>
                                                    </div>
                                                    <div class="panel-hover-icon">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-while b-light m-n">
                                            <div class="panel-hover">
                                                <a href="#" class="block wrapper-lg">
                                                    <div class="panel-hover-title b-b">
                                                        <p class="h4">Peerage of England</p>
                                                    </div>
                                                    <div class="panel-hover-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis .</p>
                                                    </div>
                                                    <div class="panel-hover-icon">
                                                        <i class="fa fa-balance-scale"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-while b-light m-n">
                                            <div class="panel-hover">
                                                <a href="#" class="block wrapper-lg">
                                                    <div class="panel-hover-title b-b">
                                                        <p class="h4">Peerage of England</p>
                                                    </div>
                                                    <div class="panel-hover-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis .</p>
                                                    </div>
                                                    <div class="panel-hover-icon">
                                                        <i class="fa fa-university"></i>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row wrapper-lg">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-dark b-light m-n">
                                            <div class="panel-hover">
                                                <a href="#" class="block wrapper-lg">
                                                    <div class="panel-hover-title b-b">
                                                        <p class="h4">Peerage of England</p>
                                                    </div>
                                                    <div class="panel-hover-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis .</p>
                                                    </div>
                                                    <div class="panel-hover-icon">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-dark b-light m-n">
                                            <div class="panel-hover">
                                                <a href="#" class="block wrapper-lg">
                                                    <div class="panel-hover-title b-b">
                                                        <p class="h4">Peerage of England</p>
                                                    </div>
                                                    <div class="panel-hover-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis .</p>
                                                    </div>
                                                    <div class="panel-hover-icon">
                                                        <i class="fa fa-balance-scale"></i>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel panel-default bg-dark b-light m-n">
                                            <div class="panel-hover">
                                                <a href="#" class="block wrapper-lg">
                                                    <div class="panel-hover-title b-b">
                                                        <p class="h4">Peerage of England</p>
                                                    </div>
                                                    <div class="panel-hover-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis .</p>
                                                    </div>
                                                    <div class="panel-hover-icon">
                                                        <i class="fa fa-university"></i>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>


            <div class="m-t-xxl">

                <div class="row bg-dark b-b box-shadow v-center">

                    <div class="container">
                        <div class="col-md-4">
                            <div class="wrapper-lg">
                                <p class="h1 font-thin">
                                    <span class="text-info">Who</span>
                                    <span class="text-white">We </span>
                                    <span class="text-info">Are?</span>
                                </p>

                                <p class="m-t-md">
                                    <small>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis .
                                    </small>
                                </p>
                                <p class="m-t-md">
                                    <a href="#" class="btn btn-info btn-rounded">Read More <i
                                                class="fa fa-angle-right m-l-xs" aria-hidden="true"></i></a>
                                </p>

                            </div>

                        </div>
                        <div class="col-md-8">

                            <div class="triangleWrapper pull-right">
                                <div class="triangle">
                                    <img src="/img/agency/line1.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>



            <div class="m-t-xxl">

                <div class="row bg-dark b-b box-shadow v-center">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="wrapper-lg">
                                    <p class="h1 font-thin">
                                        <span class="text-white">People </span>
                                        <span class="text-info">About Us</span>
                                    </p>

                                    <p class="m-t-md">
                                        <small>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis .
                                        </small>
                                    </p>
                                    <p class="m-t-md">
                                        <a href="#" class="btn btn-info btn-rounded">Read More <i
                                                    class="fa fa-angle-right m-l-xs" aria-hidden="true"></i></a>
                                    </p>

                                </div>

                            </div>
                            <div class="col-md-3">

                                <div class="triangleWrapper pull-right">
                                    <div class="triangle">
                                        <img src="/img/agency/press.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="wrapper-lg">
                                    <p class="">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation </p>

                                    <p class="text-right m-t-md font-thin text-white">- Barak <span class="text-info">Obama</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


            </div>


            <div class="container-fluid m-t-xxl">

                <div class="row">

                    <div class="container">


                        <div class="row wrapper-lg">
                            <div class="col-md-10 col-md-offset-1">
                                <p class="h1 font-thin">Our <span class="text-info">Clients</span></p>

                                <div class="col-md-8 pull-in m-t-md">
                                    <small>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row wrapper-lg">
                            <div class="col-md-10 col-md-offset-1">

                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="#" class="btn-opacity block">
                                            <img src="/img/clients/1.png" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="btn-opacity block">
                                            <img src="/img/clients/2.png" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="btn-opacity block">
                                            <img src="/img/clients/3.png" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="btn-opacity block">
                                            <img src="/img/clients/4.png" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="btn-opacity block">
                                            <img src="/img/clients/5.png" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="btn-opacity block">
                                            <img src="/img/clients/6.png" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>


                </div>

            </div>


            <section class="bg-white">
                <div class="container-fluid">

                    <div class="row box-shadow-lg">

                        <div class="container">

                            <div class="row wrapper-lg">
                                <div class="col-md-10 col-md-offset-1">
                                    <p class="h1 font-thin">Как работает сервис <span
                                                class="text-info">помощи студентам</span>?</p>

                                    <div class="col-md-8 pull-in m-t-md  text-justify">
                                        <small>
                                            Уважаемые исполнители - зарабатывать с нами легко и удобно. Здесь размещают
                                            любые студенческие заказы: рефераты, курсовые, дипломные, контрольные и
                                            другие работы.
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="row wrapper-lg">
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3  font-thin">
                                            <div class="h3 text-info b-b b-info padder-v font-thin">
                                                1. Заказать
                                            </div>
                                            <div class=" text-muted m-t-md l-h-1x">
                                                <strong>Сервис бесплатно разошлёт ваш заказ исполнителям</strong>
                                                <p>А исполнители предложат цены. Это удобнее, чем искать кого-то по
                                                    интернету. Тем более если у вас срочный заказ студенческой работы.
                                                    Оформите заявку и узнайте стоимость работы уже сегодня.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3  font-thin">
                                            <div class="h3 text-info b-b b-info padder-v font-thin">
                                                2. Выбрать
                                            </div>
                                            <div class=" text-muted m-t-md l-h-1x">
                                                Выберите исполнителя по цене и отзывам
                                                С выбранным исполнителем вы сможете связаться в любое время и узнать о
                                                ходе выполнения. Кроме того, вы сможете получать работу по частям — так
                                                вы будете уверены, что работа идёт в нужном русле.
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3  font-thin">
                                            <div class="h3 text-info b-b b-info padder-v font-thin">
                                                3. Оплатить
                                            </div>
                                            <div class=" text-muted m-t-md l-h-1x">
                                                Получите выполненный заказ и отправьте преподавателю
                                                На все выполненные работы мы даём гарантию. После защиты работы вы
                                                сможете оставить исполнителю отзыв. Теперь вы знаете, почему стоит
                                                заказывать студенческие работы на Сервисе помощи студентам.
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3  font-thin">
                                            <div class="h3 text-info b-b b-info padder-v font-thin">
                                                4. Скачать
                                            </div>
                                            <div class=" text-muted m-t-md l-h-1x">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis .
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>


                        </div>


                    </div>

                </div>
            </section>


            <section class="container-fluid b-b b-t">
                <div class="row">

                    <div class="container m-t-lg m-b-lg">

                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="m-t-md m-b-md v-center">
                                    <div class="pull-left m-r-md">
                                        <i class="icon-credit-card fa-4x"></i>
                                    </div>
                                    <div class="">
                                        <strong class="text-uppercase text-info m-b-xs block">ОТ 500 РУБЛЕЙ</strong>
                                        <small class="font-thin">Квалифицированная помощь от наших специалистов за
                                            небольшие деньги
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="m-t-md m-b-md v-center">
                                    <div class="pull-left m-r-md">
                                        <i class="icon-clock fa-4x"></i>
                                    </div>
                                    <div class="">
                                        <strong class="text-uppercase text-info m-b-xs block">ОТ 1 ДНЯ</strong>
                                        <small class="font-thin">Вы сами устанавливаете срок к которому вам необходимо
                                            получить готовую работу
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="m-t-md m-b-md v-center">
                                    <div class="pull-left m-r-md">
                                        <i class="icon-layers fa-4x"></i>
                                    </div>
                                    <div class="">
                                        <strong class="text-uppercase text-info m-b-xs block">БЕСПЛАТНЫЕ
                                            ДОРАБОТКИ</strong>
                                        <small class="font-thin">Без лишних вопросов доведём работу до требуемого
                                            результата без дополнительных затрат
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>










            <div class="bg-light  b-b box-shadow-lg" style="
            box-shadow: inset 0 0 21px rgba(0, 0, 1, 0.1);
            ">
        <div class="container">

            <div class="row m-t-xl m-b-xl">
                <div class="col-sm-6 text-center col-sm-offset-3">
                    <h4 class="m-b h2">Всё ещё не уверены?</h4>
                    <p>Обратитесь в нашу службу поддержки и мы с радостью поможем вам,
                        или воспользуйтесь пробным периодом!</p>
                </div>
            </div>


            <div class="row m-t-xl m-b-xl">
                <div class="col-sm-6 text-right">
                    <a href="{{ route('contacts') }}" class="btn btn-lg btn-default btn-rounded btn-info">Задать
                        вопрос</a>
                </div>
                <div class="col-sm-6 text-left">
                    <a href="{{ route('login') }}" class="btn btn-lg btn-default btn-rounded btn-info">Пробный
                        период</a>
                </div>
            </div>
        </div>
    </div>
@stop
