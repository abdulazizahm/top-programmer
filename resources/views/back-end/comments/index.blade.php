<table class="table" id="comments">
    <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>
                    <small>{{ $comment->user->name }}</small>
                    <p>{{$comment->comment}}</p>
                    <small>{{$comment->created_at}}</small>
                </td>
                <td class="td-actions text-right">
                    <a  rel="tooltip" title="" class="btn btn-white btn-link btn-sm" onclick="$(this).closest('tr').next().slideToggle()" data-original-title="Edit Comment">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="{{route('comment.delete',$comment->id)}}" rel="tooltip" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr style="display: none">
                <td colspan="4">
                    <form method="POST" action="{{route('comment.update',$comment->id)}}" >
                    {{csrf_field()}}
                    @include('back-end.comments.form',['row'=>$comment])
                    <input type="hidden" value="{{$row->id}}" name="video_id">
                    <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
                    <div class="clearfix"></div>
                    </form>

                </td>
            </tr>
        @endforeach

    </tbody>
</table>

