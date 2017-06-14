@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-xxl m-b-xxl">
            <div class="col-md-10 col-md-offset-1">

                <div class="b box-shadow display-flex">
                <div class="col-md-6 no-padder bg-info">
                    <div class="wrapper-lg m-t-md m-b-md">
                        <p class="h3 padder-v text-center m-b-md text-uppercase">Малый <span
                                    class="text-black">тендер</span></p>
                        <img src="/img/image-02.png" class="img-responsive center">
                        <p class="w-md text-center center padder-v">Уже зарегистрированы? <a href="/login/">Авторизуйтесь</a>, чтобы использовать систему</p>
                    </div>
                </div>
                <div class="col-md-6 no-padder bg-white">
                    <div class="wrapper-lg m-t-md m-b-md">
                        <p class="h3 padder-v m-b-md">Регистрация</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="stepwizard hidden">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>Step 1</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle"
                                           disabled="disabled">2</a>
                                        <p>Step 2</p>
                                    </div>
                                </div>
                            </div>

                            <div class="setup-content" id="step-1">

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="name" class="control-label text-left padder-v-5">Название
                                            компании</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="email" class="control-label text-left padder-v-5">E-Mail
                                            адрес</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="phone" class="control-label text-left padder-v-5">Телефон</label>
                                        <input id="phone" type="text" class="form-control" name="phone"
                                               value="{{ old('phone') }}" required maxlength="255"
                                               data-mask="+ 9-999-999-99-99" hidden>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="password" class="control-label text-left padder-v-5">Пароль</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">


                                    <div class="col-md-6">
                                        <label for="password-confirm" class="control-label text-left padder-v-5">Повторите
                                            пароль</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button class="btn btn-sm btn-info btn-rounded m-t-md nextBtn"
                                                type="button">
                                            Далее
                                        </button>
                                    </div>
                                </div>


                            </div>

                            <div class=" setup-content" id="step-2">

                                <div class="form-group{{ $errors->has('type_of_activity') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="agent_name" class="control-label text-left padder-v-5">Имя
                                            представителя</label>
                                        <input id="agent_name" type="text" class="form-control" name="agent_name"
                                               value="{{ old('agent_name') }}" required>

                                        @if ($errors->has('type_of_activity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('agent_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('inn') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="inn" class="control-label text-left padder-v-5">ИНН</label>
                                        <input id="inn" type="text" class="form-control" name="inn"
                                               value="{{ old('inn') }}" required maxlength="12">

                                        @if ($errors->has('inn'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('inn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ogrn') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="ogrn" class="control-label text-left padder-v-5">ОГРН</label>
                                        <input id="ogrn" type="text" class="form-control" name="ogrn"
                                               value="{{ old('ogrn') }}" required maxlength="15">

                                        @if ($errors->has('ogrn'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ogrn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="address" class="control-label text-left padder-v-5">Адрес</label>
                                        <input id="address" type="text" class="form-control" name="address"
                                               value="{{ old('address') }}" required maxlength="255">

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">


                                    <div class="col-md-12">
                                        <label for="website" class="control-label text-left padder-v-5">Сайт</label>
                                        <input id="website" type="url" class="form-control" name="website"
                                               value="{{ old('website') }}" required maxlength="255">

                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-md-6 text-left">
                                        <button class="btn btn-sm btn-default btn-rounded m-t-md prevBtn"
                                                type="button">
                                            Назад
                                        </button>
                                    </div>


                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-sm btn-info btn-rounded m-t-md">
                                            Зарегистрироваться
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection
