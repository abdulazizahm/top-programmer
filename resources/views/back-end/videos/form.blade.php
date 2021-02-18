{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            @php
                $input="name";
            @endphp
            <label class="bmd-label-floating">Video Name</label>
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
    <div class="col-md-6">
        <div class="form-group">
            @php
                $input="youtube";
            @endphp
            <label class="bmd-label-floating">Youtube url</label>
            <input type="url" name="{{$input}}" value="{{isset($row)?$row->{$input}:''}}" class="form-control @error($input) is-invalid @enderror">
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
                $input="published";
            @endphp
            <label class="bmd-label-floating">Video status</label>
            <select name='{{$input}}'  class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{isset($row)&&$row->{$input}==1?'selected':''}} >published</option>
                <option value="0" {{isset($row)&&$row->{$input}==0?'selected':''}} >hidden</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div>
            @php
                $input="image";
            @endphp
            <label >Video image</label>
            <input type="file" name="{{$input}}" >
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
                $input="cat_id";
            @endphp
            <label class="bmd-label-floating">Video category</label>
            <select name='{{$input}}'  class="form-control @error($input) is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{isset($row)&&$row->{$input}==$category->id?'selected':''}} >{{$category->name}}</option>>
                @endforeach
            </select>
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
            <label class="bmd-label-floating">Video Description</label>
            <textarea  name='{{$input}}' cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{isset($row)?$row->{$input}:''}}</textarea>
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
        <textarea  name='{{$input}}' cols="30" rows="2" class="form-control @error($input) is-invalid @enderror">{{isset($row)?$row->{$input}:''}}</textarea>
        @error($input)
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        @php
            $input="skills[]";
        @endphp
        <label class="bmd-label-floating">Video skill</label>
        <select name='{{$input}}'  class="form-control @error($input) is-invalid @enderror" multiple style="height: 60px">
            @foreach($skills as $skill)
                <option value="{{$skill->id}}" {{in_array($skill->id,$selectedskills)?'selected':''}}>{{$skill->name}}</option>>
            @endforeach
        </select>
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
            $input="tags[]";
        @endphp
        <label class="bmd-label-floating">Video tag</label>
        <select name='{{$input}}'  class="form-control @error($input) is-invalid @enderror" multiple style="height: 60px">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}" {{in_array($tag->id,$selectedtags)?'selected':''}}>{{$tag->name}}</option>>
            @endforeach
        </select>
        @error($input)
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>
