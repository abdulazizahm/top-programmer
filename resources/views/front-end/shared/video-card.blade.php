<div class="card" style="width: 20rem;" title="{{$video->name}}">
    <a href="{{route('frontend.video',$video->id)}}">
        <img class="card-img-top" src="{{url('uploads/'.$video->image)}}" alt="{{$video->name}}" title="{{$video->name}}" style="max-height: 160px">
    </a>
    <div class="card-body">
        <p class="card-text">
            <a href="{{route('frontend.video',$video->id)}}">
                {{$video->name}}
            </a>
        </p>
        <small>{{$video->created_at}}</small>
    </div>
</div>
