@extends('back-end.layout.app')

@section('title')
    Home title
@endsection


@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            Home page
        @endslot
    @endcomponent
    @include('back-end.home-sessions.statics')
    @include('back-end.home-sessions.lastest-comments')
@endsection
