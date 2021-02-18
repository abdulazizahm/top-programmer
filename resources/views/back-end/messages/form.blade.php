{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            @php
                $input="name";
            @endphp
            <label class="bmd-label-floating">Page Name</label>
            <input type="text" name='{{$input}}' value="{{isset($row)?$row->{$input}:''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            @php
                $input="email";
            @endphp
            <label class="bmd-label-floating">email</label>
            <input type="email" name='{{$input}}' value="{{isset($row)?$row->{$input}:''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        @php
            $input="message";
        @endphp
        <label class="bmd-label-floating">message</label>
        <textarea  name='{{$input}}' cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{isset($row)?$row->{$input}:''}}</textarea>
        @error($input)
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>

<hr>

<h4>Replay message</h4>
<br>

<form action="{{route('replay.message',$row->id)}}" method="POST">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                @php
                    $input="message";
                @endphp
                <label class="bmd-label-floating">message</label>
                <textarea  name='{{$input}}' cols="30" rows="5" class="form-control @error($input) is-invalid @enderror"></textarea>
                @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">replay message</button>
    <div class="clearfix"></div>
</form>

