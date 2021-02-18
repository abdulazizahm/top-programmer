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
                $input="meta_keywords";
            @endphp
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="text" name="{{$input}}" value="{{isset($row)?$row->{$input}:''}}" class="form-control @error($input) is-invalid @enderror">
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
                $input="des";
            @endphp
            <label class="bmd-label-floating">Page Description</label>
            <textarea  name='{{$input}}' cols="30" rows="10" class="form-control @error($input) is-invalid @enderror">{{isset($row)?$row->{$input}:''}}</textarea>
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
            $input="meta_des";
        @endphp
        <label class="bmd-label-floating">Meta Description</label>
        <textarea  name='{{$input}}' cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{isset($row)?$row->{$input}:''}}</textarea>
        @error($input)
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>
