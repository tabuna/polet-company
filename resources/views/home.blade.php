@extends('layouts.main')

@section('main')
    <transition name="fade">
        <router-view></router-view>
    </transition>
@stop
