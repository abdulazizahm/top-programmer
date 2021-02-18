@if(auth()->user())
    <form action="{{route('frontend.commentStore',$video->id)}}" method="POST">
        {{csrf_field()}}
        <label >add comment</label>>
        <div class="form-group">
            <textarea name="comment" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Add comment</button>
    </form>
@endif
