
<div class="card card-nav-tabs" id="update" style="display: none">
    <div class="card-header card-header-warning" style="margin-top: 10;margin-bottom: 5px">
        <h3>Update profile</h3>
    </div>
    <div class="card-body" >
        <form action="{{route('profile.update')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        @php
                            $input="name";
                        @endphp
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" name='{{$input}}' value="{{isset($user)?$user->{$input}:''}}" class="form-control @error($input) is-invalid @enderror">
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
                        <input type="email" name="{{$input}}" value="{{isset($user)?$user->{$input}:''}}" class="form-control @error($input) is-invalid @enderror">
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
            </div>
            <button type="submit" class="btn btn-primary pull-right">update profile</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
