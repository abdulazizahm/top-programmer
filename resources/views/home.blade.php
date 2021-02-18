@extends('layouts.app')
@section('title','home')
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>Lastest Videos</h2>
            </div>
            @if(request()->has('search')&&request()->get('search')!='')
                <p style="font-size: 20px;">
                    you are search on <b style="font-size: 25px;">{{request()->get('search')}}</b> | <a href="{{route('home')}}">Reset</a>
                </p>
                <br>
            @endif
         @include('front-end.shared.video-row')
        </div>
    </div>
@endsection
