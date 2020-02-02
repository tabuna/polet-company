@extends('layouts.app')

@section('content')


    <div class="bg-black-opacity">

        <section class="container-fluid hidden-xs">
            <div class="row">
                <div style="background:url(/img/header4.jpg) bottom center; background-size:cover">
                    <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                        <div class="row  m-t-xxl m-b-xxl">
                            <div class="container m-t-md top-desc-block">

                                <div class="col-xs-12">
                                    <div class="page-hero-content">
                                        <h1 class="text-white">
                                            <span class="text-info">Единая бизнес система.</span> <br>
                                            Организация закупок и продаж
                                        </h1>
                                        <p class="text-white">
                                            Получайте выгодные предложения без посредников от <br> поставщиков и исполнителей.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <div class="bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="padder-v m-t-md">

                            <p class="text-info h4 font-thin m-b">Автоматизированный поиск поставщика и клиента</p>

                            <h3 class="h1 font-thin m-t-n l-h-1x padder-v text-black">
                                Единая бизнес система — это просто:
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="#registation" data-ride="scroll">
                        <i class="m-t-md m-b-xl icon-arrow-down-circle fa-2x text-muted"></i>
                        </a>
                    </div>
                </div>


                <div class="row m-b-xl m-t-xl v-center">
                    <div class="col-md-6 col-xs-12 ">
                        <p class="h1 font-thin text-black">
                            <span class="text-info">01</span>
                            <br>
                            Удобный поиск
                        </p>


                        <ul class="list-group no-bg no-borders pull-in m-t-lg basic-list-blue">
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200" data-wow-delay="600">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Быстрая сортировка по категориям
                            </li>
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200" data-wow-delay="900">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Рекомендации системы
                            </li>
                            <li class="list-group-item fadeInUp wow"  data-wow-offset="200"  data-wow-delay="1100">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                «Умные» тэги
                            </li>
                        </ul>


                    </div>
                    <div class="col-md-6 hidden-xs text-center">
                        <img src="/img/image-01.png" class="img-responsive center">
                    </div>
                </div>


                <div class="row m-b-xl m-t-xxl v-center">
                    <div class="col-md-6 hidden-xs text-center">
                        <img src="/img/image-02.png" class="img-responsive center">
                    </div>
                    <div class="col-md-6 col-xs-12 ">
                        <p class="h1 font-thin text-black">
                            <span class="text-info">02</span>
                            <br>
                            Актуальная информация
                        </p>


                        <ul class="list-group no-bg no-borders pull-in m-t-lg">

                            <li class="list-group-item fadeInUp wow" data-wow-offset="200" data-wow-delay="600">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Максимально важная информация о товарах, услугах и закупках индивидуально для каждого участника
                            </li>
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200" data-wow-delay="900">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Работа без посредников
                            </li>
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200" data-wow-delay="1100">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Система мгновенных сообщений
                            </li>
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200"  data-wow-delay="1400">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Подробная информация о контрагентах
                            </li>
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200"  data-wow-delay="1600">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Проверенные, честные отзывы
                            </li>



                        </ul>

                    </div>
                </div>


                <div class="row m-b-xxl m-t-xxl v-center">
                    <div class="col-md-6 col-xs-12">
                        <p class="h1 font-thin text-black">
                            <span class="text-info">03</span>
                            <br>
                            Бесплатное пользование
                        </p>


                        <ul class="list-group no-bg no-borders pull-in m-t-lg">
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200"  data-wow-delay="600">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Бесплатная регистрация <strong>на период бета-тестирования</strong>
                            </li>
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200"  data-wow-delay="900">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Возможность оплаты через онлайн-сервисы
                            </li>
                            <li class="list-group-item fadeInUp wow" data-wow-offset="200"  data-wow-delay="1100">
                                <i class="icon-check pull-left text-lg m-r text-info"></i>
                                Мониторинг транзакций
                            </li>
                        </ul>


                    </div>
                    <div class="col-md-6 hidden-xs text-center">
                        <img src="/img/image-04.png" class="img-responsive center">
                    </div>
                </div>


                <div class="row m-t-xxl m-b-xxl">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="padder-v m-t-md">
                            <h1 class="font-thin m-t-n l-h-1x padder-v text-black">
                                Доступный инструмент<br>
                                с максимальным эффектом
                            </h1>
                            <p class="text-muted wow fadeInDown" data-wow-offset="200" data-wow-delay="600">
                                Оформив подписку, вы получаете гарантированный источник<br>
                                партнеров для сотрудничества
                            </p>
                        </div>
                    </div>
                </div>


                <div class="row no-gutter  m-t-xxl m-b-md">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-2">
                        <div class="panel b-a">
                            <div class="panel-heading wrapper-xs bg-default no-border">
                            </div>
                            <div class="wrapper text-center b-b b-light">
                                <h4 class="text-u-c m-b-none">Подписка
                                                              на 1 месяц
                                </h4>
                                <h2 class="m-t-none">
                                    <sup class="pos-rlt" style="top:-22px">&#8381;</sup>
                                    <span class="text-2x text-lt">2 000</span>
                                    <span class="text-xs">/ месяц</span>
                                </h2>
                            </div>
                            <ul class="list-group no-borders m-t-sm">
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Быстрая сортировка по категориям
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Рекомендации системы
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Подробная информация о контрагентах
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Мониторинг произведённых транзакций
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-close text-info m-r-xs"></i> <span class="text-l-t">Долгий поиск контрагентов</span>
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-close text-info m-r-xs"></i> <span class="text-l-t">Неактуальная информация</span>
                                </li>
                            </ul>
                            <div class="panel-footer text-center">
                                <a href="{{route('register')}}" class="btn btn-default m">Оформить подписку</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="panel b-a">
                            <div class="panel-heading wrapper-xs bg-default no-border">

                            </div>
                            <div class="wrapper text-center b-b b-light">
                                <h4 class="text-u-c m-b-none">Подписка
                                                              на 1 год
                                </h4>
                                <h2 class="m-t-none">
                                    <sup class="pos-rlt" style="top:-22px">&#8381;</sup>
                                    <span class="text-2x text-lt">1 000</span>
                                    <span class="text-xs">/ месяц</span>
                                </h2>
                            </div>
                            <ul class="list-group no-borders m-t-sm">
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Быстрая сортировка по категориям
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Рекомендации системы
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Подробная информация о контрагентах
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-check text-info m-r-xs"></i> Мониторинг произведённых транзакций
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-close text-info m-r-xs"></i> <span class="text-l-t">Долгий поиск контрагентов</span>
                                </li>
                                <li class="list-group-item">
                                    <i class="icon-close text-info m-r-xs"></i> <span class="text-l-t">Неактуальная информация</span>
                                </li>
                            </ul>
                            <div class="panel-footer text-center">
                                <a href="{{route('register')}}" class="btn btn-default m">Оформить подписку</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-b-lg">
                    <div class="col-md-12">
                        <div class="text-center">
                            <p class="h4">В настоящий момент портал находиться на этапе бета-тестирования.<br>
                            Участие бесплатно. Всем участникам тестирования будет предоставлено<br>
                                бесплатное обслуживание в течении 2020 года!</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection

@section('footer')


    <div class="bg-white b-t">
        <div class="container">
            <div class="row m-t-xxl m-b-xxl">
                <div class="col-md-12"><h1 class="font-thin m-t-n l-h-1x padder-v text-black">Наши преимущества!</h1>
                    <div>
                        <p>
                            Возможность максимально подробно рассказать о своей деятельности другим участникам бизнес
                            системы.
                        </p>

                        <p>
                            При каждом заходе на сайт система подготовит актуальный список возможных контрагентов на
                            закупку, продажу или выполнение услуги.
                        </p>

                        <p>
                            При регистрации в бизнес-системе, ваши потенциальные партнеры получат уведомление о вашем
                            предложении, спросе и виде деятельности, равно как и вы получите уведомление о предложении,
                            спросе и виде деятельности ваших потенциальных партнёров.
                        </p>

                        <p>
                            Система полностью автоматизирована. Теперь нет необходимости самостоятельно заниматься
                            поиском поставщиков и клиентов. Система сделает это за Вас, сэкономив Ваше время.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="registation" class="bg-black hidden-xs" style="background: url(/img/footer.jpg); background-size: cover">
        <div class="bg-black-opacity">
            <div class="container">
                <div class="row  m-t-xxl m-b-xxl">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-xs-height col-middle">
                            <div class="text-center">
                                <h2 class="text-white col-sm-12 font-thin ">Uniten<br>
                                    Место где пересекаются интересы
                                </h2>
                                <a href="/register" class="btn btn-lg btn-info btn-rounded m-t-md wow fadeInUp"
                                   data-wow-offset="200" data-wow-delay="600">
                                    Попробовать бесплатно
                                </a>
                                {{--
                                <p class="text-muted m-t-md wow fadeInUp" data-wow-offset="200" data-wow-delay="900">
                                    Бесплатный доступ исключительные на площадке,<br>
                                    для ознакомления, не предоставляет общие услуги
                                </p>
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
