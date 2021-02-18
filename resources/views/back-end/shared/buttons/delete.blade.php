<form action="{{route($routeName.'.destroy',$row->id)}}" method="POST">
    {{method_field('delete')}}
    {{csrf_field()}}
    <button type="submit" rel="tooltip" title="Remove {{$smodelName}}" class= "btn btn-white btn-link btn-sm">
        <i class="material-icons">close</i>
    </button>
</form>
