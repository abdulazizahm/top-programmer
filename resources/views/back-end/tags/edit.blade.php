@extends('back-end.layout.app')
@php
    $modelName=" User";

@endphp

@section('title')
    {{$pageTitle}}
@endsection


@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent
@component('back-end.shared.edit',['pageTitle'=>$pageTitle,'pageDes'=>$pageDes])
        <form action="{{route($routeName.'.update',$row->id)}}"  method="POST">
            {{method_field('put')}}
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">update {{$modelName}}</button>
            <div class="clearfix"></div>
        </form>
@endcomponent
@endsection
