@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-xxl m-b-xxl">
            <div class="col-md-10 col-md-offset-1">

                <div class="b box-shadow display-flex">
                    <div class="col-md-6 no-padder bg-info">
                        <div class="wrapper-lg m-t-md m-b-md">
                            <p class="h3 padder-v text-center m-b-md text-uppercase">Малый <span class="text-black">тендер</span>
                            </p>
                            <img src="/img/image-02.png" class="img-responsive center">
                            <p class="w-md text-center center padder-v">Пройдите простую <a href="/register/">регистрацию</a>,
                                что бы начать пользоваться системой</p>
                        </div>
                    </div>
                    <div class="col-md-6 no-padder bg-white">
                        <div class="wrapper-lg m-t-md m-b-md">
                            <p class="h3 padder-v m-b-md">Смена пароля</p>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{ $token }}">


                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label text-left padder-v-5">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email"
                                               placeholder=""
                                               class="form-control" required
                                               value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label text-left padder-v-5">Password</label>

                                    <div class="controls">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="control-label text-left padder-v-5">Confirm Password</label>
                                    <div class="controls">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-info btn-rounded m-t-md "
                                                type="submit">Сменить пароль</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="padder-lg m-b-md">
                            <p class="m-t-lg"><a href="{{ url('/register') }}">В первые у нас?</a></p>
                        </div>



                    </div>
                </div>
            </div>
        </div>


@endsection
