@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-xxl m-b-xxl">
            <div class="col-md-10 col-md-offset-1">

                <div class="col-md-6 no-padder bg-info box-shadow-lg">
                    <div class="wrapper-lg m-t-md m-b-md">
                        <p class="h3 padder-v text-center m-b-md text-uppercase">Малый <span
                                    class="text-black">тендер</span></p>
                        <img src="/img/image-02.png" class="img-responsive center">
                        <p class="w-md text-center center padder-v">Пройдите простую регистрацию, что бы начать
                            пользоваться системой</p>
                    </div>
                </div>
                <div class="col-md-6 no-padder bg-white box-shadow-lg">
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

                            <div class="row setup-content" id="step-1">

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Имя</label>

                                    <div class="col-md-6">
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
                                    <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Пароль</label>

                                    <div class="col-md-6">
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
                                    <label for="password-confirm" class="col-md-4 control-label">Повторите пароль</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button class="btn btn-lg btn-info btn-rounded m-t-md nextBtn"
                                                type="button">
                                            Далее
                                        </button>
                                    </div>
                                </div>


                            </div>

                            <div class="row setup-content" id="step-2">

                                <div class="form-group{{ $errors->has('type_of_activity') ? ' has-error' : '' }}">
                                    <label for="type_of_activity" class="col-md-4 control-label">Тип деятельности</label>

                                    <div class="col-md-6">
                                        <input id="type_of_activity" type="text" class="form-control" name="type_of_activity"
                                               value="{{ old('type_of_activity') }}" required>

                                        @if ($errors->has('type_of_activity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('type_of_activity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('inn') ? ' has-error' : '' }}">
                                    <label for="inn" class="col-md-4 control-label">ИНН</label>

                                    <div class="col-md-6">
                                        <input id="inn" type="text" class="form-control" name="inn"
                                               value="{{ old('inn') }}" required placeholder="ИНН" maxlength="12">

                                        @if ($errors->has('inn'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('inn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ogrn') ? ' has-error' : '' }}">
                                    <label for="ogrn" class="col-md-4 control-label">ОГРН</label>

                                    <div class="col-md-6">
                                        <input id="ogrn" type="text" class="form-control" name="ogrn"
                                               value="{{ old('ogrn') }}" required placeholder="ИНН" maxlength="15">

                                        @if ($errors->has('ogrn'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ogrn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Адрес</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control" name="address"
                                               value="{{ old('address') }}" required placeholder="Адрес" maxlength="255">

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Телефон</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone"
                                               value="{{ old('phone') }}" required placeholder="Телефон" maxlength="255"
                                               data-mask="+ 9-999-999-99-99" hidden>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                    <label for="website" class="col-md-4 control-label">Сайт</label>

                                    <div class="col-md-6">
                                        <input id="website" type="url" class="form-control" name="website"
                                               value="{{ old('website') }}" required placeholder="Сайт" maxlength="255">

                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group">

                                        <div class="col-md-4 ">
                                            <button class="btn btn-lg btn-info btn-rounded m-t-md prevBtn pull-right"
                                                    type="button">
                                                Назад
                                            </button>
                                        </div>


                                    <div class="col-md-6 ">
                                        <button type="submit" class="btn btn-lg btn-info btn-rounded m-t-md ">
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
@endsection
