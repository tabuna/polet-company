@extends('layouts.main')

@section('title','Мой профиль')

@section('main')

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">


            @include('dashboard::partials.alert')

            <form class="form-horizontal" action="{{route('profile.update')}}" method="POST"
                  enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-9">
                        <div class="v-center">
                            <div class="fileinput fileinput-exists thumb-lg pull-left m-r-md" data-provides="fileinput">

                                <div class="btn-file">
                                    <div class="user-avatar fileinput-preview  thumb-lg pull-left m-r-md">
                                        <img src="{{$user->avatar or '/img/avatar.png' }}"
                                             alt="Нажмите, что бы изменить изображение"
                                             class="">
                                    </div>

                                    <input type="file" name="avatar">
                                </div>

                            </div>


                            <div class="clear m-b">
                                <div class="m-b m-t-sm">
                                    <span class="h3 text-black">{{$user->name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif


                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Полное имя</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control form-control-grey"
                               value="{{$user->name or old('name')}}"
                               placeholder="Ваше полное имя" maxlength="120">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('inn') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">ИНН:</label>
                    <div class="col-sm-9">
                        <input type="text" name="inn" class="form-control form-control-grey"
                               value="{{$user->inn or old('inn')}}"
                               placeholder="ИНН" maxlength="12">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('ogrn') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">ОГРН:</label>
                    <div class="col-sm-9">
                        <input type="text" name="ogrn" class="form-control form-control-grey"
                               value="{{ $user->ogrn or old('ogrn')}}"
                               placeholder="ОГРН" maxlength="15">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Телефон</label>
                    <div class="col-sm-9">
                        <input type="tel" name="phone" class="form-control form-control-grey"
                               data-mask="+ 9-999-999-99-99"
                               value="{{$user->phone or old('phone')}}"
                               placeholder="Номер телефона">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Электронная почта</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control form-control-grey"
                               value="{{ $user->email or old('email')}}"
                               placeholder="Электронная почта" maxlength="120">
                    </div>
                </div>


                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Веб-сайт</label>
                    <div class="col-sm-9">
                        <input type="url" name="website" class="form-control form-control-grey"
                               value="{{ $user->website or old('website')}}"
                               placeholder="Личный веб-сайт" maxlength="120">
                    </div>
                </div>


                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">О Компании</label>
                    <div class="col-sm-9">
                    <textarea class="form-control form-control-grey no-resize" rows="8" name="about"
                              placeholder="Небольшой рассказ о себе">{{$user->about or old('about')}}</textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Адрес</label>
                    <div class="col-sm-9">
                        <input class="form-control form-control-grey no-resize" name="address"
                               placeholder="Адрес" value="{{$user->address or old('address')}}"/>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('notification') ? ' has-error' : '' }}">
                    <div class="col-sm-offset-3 col-sm-9">
                        <label class="i-checks i-checks-sm">
                            <input type="radio" name="notification" value="1" @if($user->notification) checked @endif>
                            <i></i>
                            Подписаться на уведомления
                        </label>

                        <label class="i-checks i-checks-sm">
                            <input type="radio" name="notification" value="0" @if(!$user->notification) checked @endif>
                            <i></i>
                            Не присылать уведомления
                        </label>

                    </div>
                </div>


                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <a href="{{route('profile.password')}}" class="btn btn-link">Изменить пароль?</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="submit" class="btn btn-info btn-rounded">Сохранить</button>
                    </div>
                </div>
            </form>


        </div>
    </div>







@endsection
