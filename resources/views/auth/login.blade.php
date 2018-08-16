@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-xxl m-b-xxl">
            <div class="col-md-10 col-md-offset-1">

                <div class="b box-shadow display-flex">
                    <div class="col-md-6 no-padder bg-info">
                        <div class="wrapper-lg m-t-md m-b-md">
                            <p class="h3 padder-v text-center m-b-md text-uppercase">Uniten</p>
                            <img src="/img/image-02.png" class="img-responsive center">
                            <p class="w-md text-center center padder-v">Пройдите простую <a class="b-b" href="/register/">регистрацию</a>,
                                что бы начать пользоваться системой</p>
                        </div>
                    </div>
                    <div class="col-md-6 no-padder bg-white">
                        <div class="wrapper-lg m-t-md m-b-md">
                            <p class="h3 padder-v m-b-md">Войти</p>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}


                                <div class="form-group form-group-default {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label text-left padder-v-5">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email"
                                               placeholder="{{trans('dashboard::auth/account.enter_email')}}"
                                               class="form-control" required
                                               value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-group-default {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label text-left padder-v-5">{{trans('dashboard::auth/account.password')}}</label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="password"
                                               placeholder="{{trans('dashboard::auth/account.enter_password')}}"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row v-center">
                                    <div class="col-xs-6">
                                        <div class="checkbox">
                                            <label class="i-checks">
                                                <input type="checkbox" checked
                                                       name="remember"><i></i> {{trans('dashboard::auth/account.remember_me')}}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <a href="{{ url('/password/reset') }}"
                                           class="text-primary small">{{trans('dashboard::auth/account.forgot_password')}}</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-info btn-rounded m-t-md "
                                                type="submit">{{trans('dashboard::auth/account.login')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
