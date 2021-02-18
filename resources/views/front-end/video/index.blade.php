@extends('layouts.app')
@section('title')
    {{$video->name}}
@endsection
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>{{$video->name}}</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php $url=getYoutubeId($video->youtube)@endphp
                    @if($url)
                        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{$url}}" frameborder="0"  allowfullscreen></iframe>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <span style="margin-left: 20px">
                            <i class="nc-icon nc-user-run"></i> : {{$video->user->name}}
                        </span>

                        <span style="margin-left: 20px">
                            <i class="nc-icon nc-calendar-60"></i> : {{$video->created_at}}
                        </span>
                        <span style="margin-left: 20px">
                            <i class="nc-icon nc-single-copy-04"></i> : <a href="{{route('front.category',$video->cat->id)}}">
                            {{$video->cat->name}}</a>
                        </span>
                    </p>
                    <p>
                        {{$video->des}}
                    </p>
                </div>

                <div class="col-md-3">
                    <h6>Tags</h6>
                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{route('front.tag',$tag->id)}}">
                                <span class="badge badge-pill badge-primary">{{$tag->name}}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
                <div class="col-md-3">
                    <h6>skills</h6>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{route('front.skill',$skill->id)}}">
                                <span class="badge badge-pill badge-info"> {{$skill->name}}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div><br><br>
           @include('front-end.video.comments')
           @include('front-end.video.add-comment')
        </div>
    </div>
@endsection
