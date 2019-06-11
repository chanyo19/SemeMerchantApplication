@extends('layouts.common1')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-signup">
                <h2 class="card-title text-center">Register User</h2>
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-12 mr-auto">
                            {{--<div class="social text-center">--}}
                                {{--<button class="btn btn-just-icon btn-round btn-twitter">--}}
                                    {{--<i class="fa fa-twitter"></i>--}}
                                {{--</button>--}}
                                {{--<button class="btn btn-just-icon btn-round btn-dribbble">--}}
                                    {{--<i class="fa fa-dribbble"></i>--}}
                                {{--</button>--}}
                                {{--<button class="btn btn-just-icon btn-round btn-facebook">--}}
                                    {{--<i class="fa fa-facebook"> </i>--}}
                                {{--</button>--}}
                                {{--<h4 class="mt-3"> or be classical </h4>--}}
                            {{--</div>--}}


                            <form class="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group has-default">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                        </div>
                                        <input id="name" type="text" placeholder="Full Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-default">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">mail</i>
                                        </span>
                                        </div>
                                        <input id="emails" type="email" placeholder="Email address" class="form-control{{ $errors->has('emails') ? ' is-invalid' : '' }}" name="email" value="{{ old('emails') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-default">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                        </div>

                                        <div class="form-group">
                                            <label>Sector</label>
                                            <select class="selectpicker" id="sector" name="sector"  data-size="7" data-style="btn btn-success btn-round" required title="Select Sector">
                                                <option disabled selected>Select Sector</option>
                                                <option value="1">IT</option>
                                                <option value="2">Hardware</option>
                                                <option value="3">Management</option>

                                            </select>

                                        </div>

                                        @if ($errors->has('sector'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sector') }}</strong>
                                          </span>
                                         @endif


                                    </div>


                                </div>
                                <div class="form-group has-default">
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                        </div>

                                        <div class="form-group">
                                            <label>Department</label>
                                            <select id="department" name="department" class="selectpicker" data-size="7" data-style="btn btn-success btn-round" required title="Select Department">
                                                <option disabled selected>Select Department</option>
                                                @foreach($company as $item)
                                                    <option  value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        @if ($errors->has('department'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department') }}</strong>
                                        </span>
                                        @endif


                                    </div>


                                </div>

                                <div class="form-group has-default">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                        </div>

                                <div class="form-group">
                                    <label>User Type</label>
                                    <select id="usertype" name="usertype" class="selectpicker" data-size="7" data-style="btn btn-success btn-round" required title="Select User Type">
                                        <option disabled selected>Select User Type</option>
                                        <option value="1">User</option>
                                        <option value="2">Secretary</option>
                                        <option value="3">Manager</option>

                                    </select>


                                    @if ($errors->has('usertype'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usertype') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                    </div>


                                </div>


                                <div class="form-group has-default">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" data-style="btn btn-success btn-round" required placeholder="Account password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group has-default">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">face</i>
                                        </span>
                                        </div>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" data-style="btn btn-success btn-round" required placeholder="Confirm password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group has-default">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">face</i>
                                        </span>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <h4 class="title">Avatar</h4>
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img src="../../assets/img/placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="avatar" />
                          </span>
                                                    <br />
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                        @endif

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                    </div>
                                </div>






                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
