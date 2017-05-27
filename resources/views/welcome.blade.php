@extends('layouts.app')

@section('content')

    <div class="bg-white-only">
        <div class="container">
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
                        <a href="{{ route('login') }}" class="btn btn-lg btn-default btn-rounded">Пробный период</a>
                    </p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="padder-v">
                        <h1 class="font-thin l-h-1x m-t-md padder-v">
                            Наши преимущества станут вашими
                        </h1>
                    </div>
                </div>
            </div>


            <div class="row m-b-xl m-t-xl v-center">
                <div class="col-md-6 ">
                    <p class="h1 font-thin">
                        <span class="text-info">01</span>
                        <br>
                        Интуитивная система
                        поиска
                    </p>


                    <ul class="list-group no-bg no-borders pull-in m-t-lg">
                        <li class="list-group-item">«Умные» теги</li>
                        <li class="list-group-item">Простая сортировка стоимости товаров и услуг</li>
                        <li class="list-group-item">Обнаружение ближайших контрагентов, соответсвующих вашим запросам</li>
                    </ul>


                </div>
                <div class="col-md-6  text-center">
                    <img src="/img/image-01.png" class="img-responsive center">
                </div>
            </div>



            <div class="row m-b-xxl m-t-xxl v-center">
                <div class="col-md-6  text-center">
                    <img src="/img/image-02.png" class="img-responsive center">
                </div>
                <div class="col-md-6 ">
                    <p class="h1 font-thin">
                        <span class="text-info">02</span>
                        <br>
                        Интуитивная система
                        поиска
                    </p>


                    <ul class="list-group no-bg no-borders pull-in m-t-lg">
                        <li class="list-group-item">«Умные» теги</li>
                        <li class="list-group-item">Простая сортировка стоимости товаров и услуг</li>
                        <li class="list-group-item">Обнаружение ближайших контрагентов, соответсвующих вашим запросам</li>
                    </ul>


                </div>
            </div>



            <div class="row m-b-xxl m-t-xxl v-center">
                <div class="col-md-6 ">
                    <p class="h1 font-thin">
                        <span class="text-info">03</span>
                        <br>
                        Интуитивная система
                        поиска
                    </p>


                    <ul class="list-group no-bg no-borders pull-in m-t-lg">
                        <li class="list-group-item">«Умные» теги</li>
                        <li class="list-group-item">Простая сортировка стоимости товаров и услуг</li>
                        <li class="list-group-item">Обнаружение ближайших контрагентов, соответсвующих вашим запросам</li>
                    </ul>


                </div>
                <div class="col-md-6  text-center">
                    <img src="/img/image-03.png" class="img-responsive center">
                </div>
            </div>



        </div>
    </div>

@endsection

@section('footer')
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
                    <a href="{{ route('contacts') }}" class="btn btn-lg btn-default btn-rounded">Задать вопрос</a>
                </div>
                <div class="col-sm-6 text-left">
                    <a href="{{ route('login') }}" class="btn btn-lg btn-default btn-rounded">Пробный период</a>
                </div>
            </div>
        </div>
    </div>
@stop
