@extends('layouts.app')

@section('title',$page->getContent('title'))
@section('description',$page->getContent('description'))
@section('keywords',$page->getContent('keywords'))
@section('image',config('app.url').$page->hero('high'))


@section('content')


    <section style="background: url({{ $page->hero() }});background-size: cover;">


        <div class="bg-black-opacity" style="height: 600px;width: 100%;object-fit: cover;">
            <div class="container" style="height: calc(100vh - 50px);   display: flex;
  align-items: center;
  justify-content: center;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="caption m-t-xs m-l-xxl m-b-xxl text-while">
                            <p class="h2 m-t-md text-white">{{$page->getContent('name')}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="container-fluid bg-white b-b box-shadow-lg padder-v">
        <div class="container load-content">

            <div class="row wrapper">
                <div class="col-md-8 col-md-offset-2">

                    <div class="m-t-md text-md">
                        <main class="wrapper-lg">
                            {!! $page->getContent('body') !!}
                        </main>


                    </div>
                </div>


            </div>


        </div>
    </div>


    @if($page->attachment('image')->count() > 1)
        <section class="container-fluid bg-white box-shadow-lg">
            <div class="container padder-v">
                <div class="col-md-10 col-md-offset-1">

                    <div class="">
                        <h3 class="font-thin">Фотографии</h3>
                        <div class="row row-sm">

                            @foreach($page->attachment('image')->get() as $image)
                                <div class="col-xs-6 col-sm-3">
                                    <div class="item padder-v">
                                        <div class="pos-rlt">
                                            <div class="item-overlay bg-black-opacity r r-2x">
                                                <div class="center text-center m-t-n w-full">
                                                    <a data-fancybox="gallery" href="{{$image->url('original')}}"><i
                                                                class="fa fa-2x fa-eye text-white"></i></a>
                                                </div>
                                            </div>
                                            <img src="{{$image->url('medium')}}"
                                                 alt="{{$page->getContent('title')}}"
                                                 class="img-full img-post r r-2x">
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>


                </div>


            </div>

        </section>
    @endif


    <section class="container-fluid b-b b-t hidden">
        <div class="row">

            <div class="container m-t-lg m-b-lg">


                <h3 class="font-thin">Организаторы</h3>
                <div class="row m-b">
                    <div class="col-md-2">
                        <a href="https://russia.travel/" rel="”nofollow”" target="_blank" class="btn-opacity block"
                           data-container="body" data-toggle="popover" data-placement="top"
                           data-content="Федеральное агентство по туризму. Национальный туристический портал"
                           data-original-title="" title="">
                            <img src="http://rusborg.ru/index2015/img/sponsor-park-attrakcionov.jpg"
                                 class="img-responsive img-thumbnail">
                        </a>
                    </div>

                    <div class="col-md-2">
                        <a href="#" rel="”nofollow”" target="_blank" class="btn-opacity block" data-container="body"
                           data-toggle="popover" data-placement="top" data-content="Автотуристский кластер «Задонщина»"
                           data-original-title="" title="">
                            <img src="http://rusborg.ru/index2015/img/sponsor-gorod48.jpg"
                                 class="img-responsive img-thumbnail">
                        </a>
                    </div>

                    <div class="col-md-2">
                        <a href="http://lipetsktime.ru/tv/shows/po-gorodam-i-vesyam/" rel="”nofollow”" target="_blank"
                           class="btn-opacity block" data-container="body" data-toggle="popover" data-placement="top"
                           data-content="По городам и весям ТРК Липецкое время" data-original-title="" title="">
                            <img src="http://rusborg.ru/index2015/img/sponsor-radio-melody.jpg"
                                 class="img-responsive img-thumbnail">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="http://lipetsktime.ru/tv/shows/po-gorodam-i-vesyam/" rel="”nofollow”" target="_blank"
                           class="btn-opacity block" data-container="body" data-toggle="popover" data-placement="top"
                           data-content="По городам и весям ТРК Липецкое время" data-original-title="" title="">
                            <img src="http://rusborg.ru/index2015/img/sponsor-dorozhnoe.png"
                                 class="img-responsive img-thumbnail">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="http://lipetsktime.ru/tv/shows/po-gorodam-i-vesyam/" rel="”nofollow”" target="_blank"
                           class="btn-opacity block" data-container="body" data-toggle="popover" data-placement="top"
                           data-content="По городам и весям ТРК Липецкое время" data-original-title="" title="">
                            <img src="http://rusborg.ru/index2015/img/sponsor-park-attrakcionov.jpg"
                                 class="img-responsive img-thumbnail">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="http://lipetsktime.ru/tv/shows/po-gorodam-i-vesyam/" rel="”nofollow”" target="_blank"
                           class="btn-opacity block" data-container="body" data-toggle="popover" data-placement="top"
                           data-content="По городам и весям ТРК Липецкое время" data-original-title="" title="">
                            <img src="http://rusborg.ru/index2015/img/sponsor-gorod48.jpg"
                                 class="img-responsive img-thumbnail">
                        </a>
                    </div>


                </div>

            </div>
        </div>
    </section>



    @if(!empty($page->getContent('place')) && key_exists('name',$page->getContent('place')))
        <div id="map-event" class="maps"
             data-lat="{{$page->getContent('place')['lat']}}"
             data-lng="{{$page->getContent('place')['lng']}}"
             data-name="{{$page->getContent('place')['name']}}"
             style="height: 300px"></div>
    @endif


@stop


@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_9M5O7t88YovZa2mePQ9VX4f79c86cqg"
        type="text/javascript"></script>
@endpush
