@extends('layouts.app')
@section('title','welcome')

@section('content')
    @include('front-end.homepage-sessions.home-image-session')
    @include('front-end.homepage-sessions.videos')
    @include('front-end.homepage-sessions.statistics')
    @include('front-end.homepage-sessions.contact-us')
@endsection
