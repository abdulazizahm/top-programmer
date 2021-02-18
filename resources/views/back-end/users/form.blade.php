{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            @php
                $input="name";
            @endphp
            <label class="bmd-label-floating">Username</label>
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
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="{{$input}}" value="{{isset($row)?$row->{$input}:''}}" class="form-control @error($input) is-invalid @enderror">
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
                $input="password";
            @endphp
            <label class="bmd-label-floating">Password</label>
            <input type="password" name='{{$input}}' class="form-control @error($input) is-invalid @enderror">
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
                $input="group";
            @endphp
            <label class="bmd-label-floating">User group</label>
            <select name='{{$input}}'  class="form-control @error($input) is-invalid @enderror">
                <option value="admin" {{isset($row)&&$row->{$input}=="admin"?'selected':''}} >admin</option>
                <option value="user" {{isset($row)&&$row->{$input}=="user"?'selected':''}} >user</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>
