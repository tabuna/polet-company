@extends('layouts.app')

@section('content')


    <section class="container-fluid hidden-xs">
        <div class="row">
            <div style="background:url(/img/header6.jpg) center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row  m-t-xxl m-b-xxl">
                        <div class="container m-t-md top-desc-block">

                            <div class="col-xs-12">
                                <div class="page-hero-content">
                                    <h1 class="text-white">
                                        <span class="text-info">Бизнес сеть.</span> Найди партнёра
                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <div class="bg-white">



        <section class="bg-white b-b box-shadow-lg">
            <div class="container">
                <div class="row  m-t-xxl m-b-xxl b-b">

                    <div class="col-md-7 col-sm-12 col-xs-12 display-table sm-height-auto">
                        <div class="row">
                            <!-- section title -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h2 class="text-black font-thin">Мы предлагаем</h2>
                                <p class="text-muted font-weight-300 m-b-lg">
                                    Мощный, современный, удобный, мало затратный, но эффективный
                                    агрегатор по поиску предложению товаров и услуг для бизнеса.
                                </p>
                            </div>
                            <!-- end section title -->
                        </div>


                    </div>
                    <div class="col-md-5 col-sm-5 hidden-xs">
                        <img class="img-responsive" src="/img/image-01.png" alt="">
                    </div>

                </div>


                <div class="row m-t-md m-b-xl text-center">
                    <div class="col-sm-4 fadeInLeft animated" data-ride="animated" data-animation="fadeInLeft"
                         data-delay="300">
                        <p class="h3 m-b-xl inline b b-dark r-3x wrapper-lg">
                            <i class=" w-1x icon-compass"></i>
                        </p>
                        <div class="m-b-xl">
                            <h3 class="m-t-none font-thin l-h-1x text-black">Наша задача</h3>
                            <p class="text-muted m-t-lg">
                                Создание и обеспечение единой точки
                                входа для получения полного комплекса
                                услуг высшего качества.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4 fadeInLeft animated" data-ride="animated" data-animation="fadeInLeft"
                         data-delay="600">
                        <p class="h3 m-b-xl inline b b-dark r-3x wrapper-lg">
                            <i class="w-1x icon-target"></i>
                        </p>
                        <div class="m-b-xl">
                            <h3 class="m-t-none font-thin l-h-1x text-black">Наша цель</h3>
                            <p class="text-muted m-t-lg">
                                Достижение высоких результатов наших клиентов и сотрудников.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4 fadeInLeft animated" data-ride="animated" data-animation="fadeInLeft"
                         data-delay="900">
                        <p class="h3 m-b-xl inline b b-dark r-3x wrapper-lg">
                            <i class="w-1x icon-star"></i>
                        </p>
                        <div class="m-b-xl">
                            <h3 class="m-t-none font-thin l-h-1x text-black">Наша мечта</h3>
                            <p class="text-muted m-t-lg">
                                Объединение и интеграция деловых предприятий и бизнес-проектов
                                страны в единое, органичное инфо пространство.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{--
        <section class="container bg-white">
            <div class="row m-t-xl m-b-xxl">
                <div class="col-md-6">
                    <h1 class="font-thin m-t-n l-h-1x padder-v text-black">Мы предлагаем</h1>
                    <div>
                        <p>
                            Мощный, современный, удобный, мало затратный, но эффективный
                            агрегатор по поиску предложению товаров и услуг для бизнеса.
                        </p>
                    </div>

                </div>

                <div class="col-md-6">
                    <p class="h2 font-thin m-t-n l-h-1x padder-v text-black">Поиск новых клиентов и источников</p>
                    <p>
                        Значимость этих проблем настолько очевидна
                    </p>
                    <div class="row transport_block">
                        <div class="col-xs-12 col-sm-6">
                            <div class="">
                                <h5 class="padder-v v-center">
                                    <i class="fa fa-plane m-r-md  fa-2x text-info" aria-hidden="true"></i>
                                    Значимость этих проблем настолько очевидна</h5>
                                <p class="text-muted">
                                    Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения позиций
                                </p>
                            </div>
                            <div class="">


                                <h5 class="padder-v v-center">
                                    <i class="fa fa-car m-r-md  fa-2x text-info" aria-hidden="true"></i>
                                    Значимость этих проблем настолько очевидна</h5>
                                <p class="text-muted">
                                    Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения позиций
                                </p>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="">

                                <h5 class="padder-v v-center">
                                    <i class="fa fa-train m-r-md  fa-2x text-info" aria-hidden="true"></i>
                                    Значимость этих проблем настолько очевидна</h5>
                                <p class="text-muted">
                                    Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения позиций
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        --}}

    </div>



@endsection

@section('footer')
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
