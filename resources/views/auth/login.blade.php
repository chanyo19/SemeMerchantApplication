@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page "
         style="background-image: url('../../assets/img/loginBackDrop.jpg'); background-size: cover;
         background-position: top center;">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7 col-sm-9 ml-5">
                    <form class="form " method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card card-login card-hidden" >
<!--                            style="height: 450px"-->
                            <div class="card-header card-header-rose text-center">
                                <h4 class="card-title">SPAHUB</h4>
                            </div>
                            <div class="card-body  text-center">
                                <p class="card-description text-center">Welcome Back! Please Login to your Account </p>
                                <span class="bmd-form-group">
                                 <div class="input-group ml-5 mr-4" style="width: auto">
<!--                                   <input type="text" class="form-control" placeholder="Mobile Number">-->
                                      <input id="email" type="email"
                                             class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                             name="email" placeholder="Email" value="{{ old('email') }}" required
                                             autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                 </div>
                                </span>
                                <span class="bmd-form-group">
                                  <div class="input-group ml-5 mr-4" style="width: auto">
<!--                                       <input type="password" class="form-control" placeholder="Password...">-->
                                      <input id="password" type="password"
                                             class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                             name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                 </div>
                                 </span>

                            </div>
                            <div class="card-footer justify-content-center mt-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>


                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                                <!--                                <a href="#pablo" class="btn btn-rose btn-link btn-lg">Lets Go</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="../../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../assets/js/material-dashboard.js?v=2.1.0" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/demo/demo.js"></script>

<script>
    $(document).ready(function () {
        md.checkFullPageBackgroundImage();
        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
@endsection
