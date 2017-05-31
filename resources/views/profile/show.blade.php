@extends('layouts.main')

@section('main')


    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class="row m-b-md padder-b b-b">
                <div class="col-md-4">
                    <img src="{{$user->getAvatar()}}" class="img-responsive">
                </div>
                <div class="col-md-5 no-padder">
                    <h3 class="text-info m-t-xs">{{$user->name}}</h3>
                    <p>ИНН: {{$user->inn}}</p>
                    <p>ОГРН: {{$user->ogrn}} </p>
                    <p class="text-muted small">
                        <i class="icon-phone text-info m-r-xs"></i>| {{$user->phone or 'Не указан'}} <br>
                        <i class="icon-envelope text-info m-r-xs"></i>| {{$user->email or 'Не указан'}} <br>
                        <i class="icon-globe text-info m-r-xs"></i>| {{$user->website or 'Не указан'}} <br>
                    </p>
                </div>
                <div class="col-md-3 no-padder text-center">
                    <p>
                        <a href="#" class="btn btn-icon btn-rounded b b-info b-2x m-r-sm"><i
                                    class="icon-star text-info"></i></a>
                        <a href="#" class="btn btn-icon btn-rounded b b-info b-2x"><i class="icon-speech text-info"></i></a>
                    </p>
                    <p class="small text-info text-xs">Рейтинг компании</p>
                </div>
            </div>

            <div class="row m-t-md m-b-md padder-v b-b">
                <div class="col-md-12">
                    <p class="text-justify">
                        {!! nl2br( htmlspecialchars($user->about)) !!}
                    </p>
                </div>
            </div>

            <div class="row m-t-md m-b-md padder-v">
                <div class="col-md-12">
                    <p><i class="icon-globe"></i> | Россия, Москва, ул. Пушкина, д. 127/43, офис 203, 123499</p>
                    <div id="google-maps">
                        <img src="/img/google.png" class="img-responsive">
                    </div>


                    {{-- По нажатию на карту, должно отправлять как добраться, первые данные пользователя, вторые компании --}}
                    <div class="get-directions">
                        <form action="http://maps.google.com/maps" method="get" target="_blank">
                            <input type="text" name="saddr" placeholder="Введите свой адрес" />
                            <input type="hidden" name="daddr" value="Октябрьская ул., 61, Липецк, Липецкая область" />
                            <input type="submit" value="Как добраться" class="direction-btn" />
                        </form>
                    </div>


                </div>
            </div>


        </div>
    </div>

    <div class="bg-white b box-shadow m-t-md">
        <div class="wrapper-md">

            <ul class="nav nav-tabs nav-justified" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab"
                                                          data-toggle="tab" aria-controls="home"
                                                          aria-expanded="true">Предложение</a></li>
                <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab"
                                                    data-toggle="tab" aria-controls="profile"
                                                    aria-expanded="false">Спрос</a></li>
                <li role="presentation" class="dropdown"><a href="#" class="dropdown-toggle" id="myTabDrop1"
                                                            data-toggle="dropdown"
                                                            aria-controls="myTabDrop1-contents"
                                                            aria-expanded="false">Отзывы <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                        <li><a href="#dropdown1" role="tab" id="dropdown1-tab" data-toggle="tab"
                               aria-controls="dropdown1">@fat</a></li>
                        <li><a href="#dropdown2" role="tab" id="dropdown2-tab" data-toggle="tab"
                               aria-controls="dropdown2">@mdo</a></li>
                    </ul>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab"><p>Raw
                        denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                        aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                        helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                        banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                        Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p></div>
                <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab"><p>Food
                        truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                        Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                        artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                        enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                        organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia
                        yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                        anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson
                        biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente
                        accusamus tattooed echo park.</p></div>
                <div class="tab-pane fade" role="tabpanel" id="dropdown1" aria-labelledby="dropdown1-tab"><p>
                        Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                        organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                        pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                        hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                        pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                        etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl
                        craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p></div>
                <div class="tab-pane fade" role="tabpanel" id="dropdown2" aria-labelledby="dropdown2-tab"><p>
                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold
                        out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack
                        portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred
                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral
                        locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft
                        beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p></div>
            </div>

        </div>
    </div>

@endsection
