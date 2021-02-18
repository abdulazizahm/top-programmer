<form method="POST" action="{{route('comment.store')}}" >
    {{csrf_field()}}
    @include('back-end.comments.form')
    <input type="hidden" value="{{$row->id}}" name="video_id">
    <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">add_comment</i> add Comment</button>
    <div class="clearfix"></div>
</form>
