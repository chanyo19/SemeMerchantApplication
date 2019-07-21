@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="page-header"
             style="background-image: url({{asset('assets/img/loginBackDrop.jpg')}}); background-size: cover;
                     background-position: top center;">
            <div class="content" style="width: 50%">
                <div class="container-fluid">
                    <div class="col-md-12 col-12 ml-5">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card card-wizard" style="margin-top: 15px; margin-bottom: 10px "
                                 data-color="rose" id="wizardRegister">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card-header card-header-rose text-center">
                                        <h3 class="card-title">SPAHUB</h3>
                                        <h5 class="card-description"> Merchant Registration</h5>
                                    </div>
                                    <div class="wizard-navigation mt-3">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item ">
                                                <a class="nav-link active" href="#register" data-toggle="tab"
                                                   role="tab">
                                                    Register
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#verification" data-toggle="tab" role="tab">
                                                    Verification
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="register">
                                                <h5 class="info-text"> Let's start with the basic information</h5>
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-3">
                                                        <div class="picture-container content-center">
                                                            <div class="picture">
                                                                <img src="https://images.vexels.com/media/users/3/135118/isolated/preview/676bf0e9f3c16649cd7f426c6dcd755a-flat-user-sign-with-round-background-by-vexels.png"
                                                                     class="picture-src" id="wizardPicturePreview"
                                                                     title=""/>
                                                                <input type="file" accept="image/x-png,image/jpeg"
                                                                       id="wizard-picture">
                                                            </div>
                                                            <h6 class="description">Spa Logo</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                <i class="material-icons">spa</i>
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="spaname" class="bmd-label-floating">
                                                                    SPA Name (required)</label>
                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('spaname') ? ' is-invalid' : '' }}"
                                                                       id="spaname" name="spaname"
                                                                       value="{{ old('spaname') }}" required autofocus>
                                                                {{--                                                                @if ($errors->has('name'))--}}
                                                                {{--                                                                    <span class="invalid-feedback" role="alert">--}}
                                                                {{--                                                                        <strong>{{ $errors->first('name') }}</strong>--}}
                                                                {{--                                                                    </span>--}}
                                                                {{--                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="material-icons">email</i>
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sapemail" class="bmd-label-floating">Email
                                                                    (required)</label>
                                                                <input type="email"
                                                                       class="form-control {{ $errors->has('spaemail') ? ' is-invalid' : '' }} "
                                                                       id="spaemail" name="spaemail"
                                                                       value="{{ old('spaemail') }}" required>
                                                                {{--                                                                @if ($errors->has('email'))--}}
                                                                {{--                                                                    <span class="invalid-feedback" role="alert">--}}
                                                                {{--                                                                        <strong>{{ $errors->first('email') }}</strong>--}}
                                                                {{--                                                                    </span>--}}
                                                                {{--                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10 mt-4 p-0">
                                                        <div class="row ">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                              <i class="material-icons">vpn_key</i>
                                                            </span>
                                                            </div>
                                                            <div class="col-sm-10 p-0">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="pass"
                                                                                   class="bmd-label-floating">
                                                                                Password (required)</label>
                                                                            <input type="text" id="password" name="password"
                                                                                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                                   required>
                                                                            {{--                                                                            @if ($errors->has('password'))--}}
                                                                            {{--                                                                                <span class="invalid-feedback" role="alert">--}}
                                                                            {{--                                                                                    <strong>{{ $errors->first('password') }}</strong>--}}
                                                                            {{--                                                                                </span>--}}
                                                                            {{--                                                                            @endif--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="repass"
                                                                                   class="bmd-label-floating">
                                                                                Confirm Password</label>
                                                                            <input type="text" id="repass" name="repass"
                                                                                   class="form-control"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="verification">

                                                <h5 class="info-text"> We send a Verification code to <label
                                                            id="msg"></label>. please enter the code below </h5>

                                                {{--                                                <div class="row justify-content-center">--}}
                                                {{--                                                    <div class="col-lg-10">--}}
                                                {{--                                                        <div class="row">--}}
                                                {{--                                                            <div class="col-sm-4">--}}
                                                {{--                                                                <div class="choice" data-toggle="wizard-checkbox">--}}
                                                {{--                                                                    <input type="checkbox" name="jobb"--}}
                                                {{--                                                                           value="Design">--}}
                                                {{--                                                                    <div class="icon">--}}
                                                {{--                                                                        <i class="fa fa-pencil"></i>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <h6>Design</h6>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                            <div class="col-sm-4">--}}
                                                {{--                                                                <div class="choice" data-toggle="wizard-checkbox">--}}
                                                {{--                                                                    <input type="checkbox" name="jobb" value="Code">--}}
                                                {{--                                                                    <div class="icon">--}}
                                                {{--                                                                        <i class="fa fa-terminal"></i>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <h6>Code</h6>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                            <div class="col-sm-4">--}}
                                                {{--                                                                <div class="choice" data-toggle="wizard-checkbox">--}}
                                                {{--                                                                    <input type="checkbox" name="jobb"--}}
                                                {{--                                                                           value="Develop">--}}
                                                {{--                                                                    <div class="icon">--}}
                                                {{--                                                                        <i class="fa fa-laptop"></i>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <h6>Develop</h6>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                                <select class="selectpicker"--}}
                                                {{--                                                                        data-style="btn btn-primary btn-round"--}}
                                                {{--                                                                        title="Single Select" data-size="7">--}}
                                                {{--                                                                    <option disabled selected>Choose city</option>--}}
                                                {{--                                                                    <option value="2">Foobar</option>--}}
                                                {{--                                                                    <option value="3">Is great</option>--}}
                                                {{--                                                                </select>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="mr-auto">
                                            <input type="button"
                                                   class="btn btn-previous btn-fill btn-default btn-wd disabled"
                                                   name="previous" value="Previous">
                                        </div>
                                        <div class="ml-auto">
                                            <input type="button" class="btn btn-next btn-fill btn-rose btn-wd"
                                                   name="next" value="Next">
                                            <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"
                                                   name="finish" value=" {{ __('Register') }}" style="display: none;">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
                    </div>
                </div>
            </div>
            <!--   Core JS Files   -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            var $email = "";
            setTimeout(function () {
                $('.card.card-wizard').addClass('active');
            }, 600);

            var $validator = $('.card-wizard form').validate({
                rules: {
                    spaname: {
                        required: true,
                        minlength: 5
                    },
                    spaemail: {
                        required: true,
                        minlength: 5
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    repass: {
                        equalTo: "#password"
                    }
                },

                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                },
                success: function (element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function (error, element) {
                    $(element).append(error);
                }
            });

            // Initialise the wizard
            $('#wizardRegister').bootstrapWizard({
                tabClass: 'nav nav-pills',
                'nextSelector': '.btn-next',
                'previousSelector': '.btn-previous',

                onInit: function (tab, navigation, index) {
                    //check number of tabs and fill the entire row
                    var $total = navigation.find('li').length;
                    var $wizard = navigation.closest('.card-wizard');

                    $first_li = navigation.find('li:first-child a').html();
                    $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
                    $('.card-wizard .wizard-navigation').append($moving_div);

                    refreshAnimation($wizard, index);

                    $('.moving-tab').css('transition', 'transform 0s');
                },
                onTabShow: function (tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;

                    var $wizard = navigation.closest('.card-wizard');

                    // If it's the last tab then hide the last button and show the finish instead
                    if ($current >= $total) {
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').show();
                    } else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                    }

                    button_text = navigation.find('li:nth-child(' + $current + ') a').html();

                    setTimeout(function () {
                        $('.moving-tab').text(button_text);
                    }, 150);

                    var checkbox = $('.footer-checkbox');

                    if (!index == 0) {
                        $(checkbox).css({
                            'opacity': '0',
                            'visibility': 'hidden',
                            'position': 'absolute'
                        });
                    } else {
                        $(checkbox).css({
                            'opacity': '1',
                            'visibility': 'visible'
                        });
                    }

                    refreshAnimation($wizard, index);
                },
                onNext: function (tab, navigation, index) {
                    var $valid = $('.card-wizard form').valid();
                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    } else {
                        $('#msg').html($('#sapemail').val());
                        console.log($('#sapemail').val())
                        return true;
                    }
                },
                onTabClick: function (tab, navigation, index) {
                    return false;
                }
            });

            // Prepare the preview for profile picture
            $("#wizard-picture").change(function () {
                readURL(this);
            });

            //Function to show image before upload
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(window).resize(function () {
                $('.card-wizard').each(function () {
                    $wizard = $(this);

                    index = $wizard.bootstrapWizard('currentIndex');
                    refreshAnimation($wizard, index);

                    $('.moving-tab').css({
                        'transition': 'transform 0s'
                    });
                });
            });


            function refreshAnimation($wizard, index) {
                $total = $wizard.find('.nav li').length;
                $li_width = 100 / $total;

                total_steps = $wizard.find('.nav li').length;
                move_distance = $wizard.width() / total_steps;
                index_temp = index;
                vertical_level = 0;

                mobile_device = $(document).width() < 600 && $total > 3;

                if (mobile_device) {
                    move_distance = $wizard.width() / 2;
                    index_temp = index % 2;
                    $li_width = 50;
                }

                $wizard.find('.nav li').css('width', $li_width + '%');

                step_width = move_distance;
                move_distance = move_distance * index_temp;

                $current = index + 1;

                if ($current == 1 || (mobile_device == true && (index % 2 == 0))) {
                    move_distance -= 8;
                } else if ($current == total_steps || (mobile_device == true && (index % 2 == 1))) {
                    move_distance += 8;
                }

                if (mobile_device) {
                    vertical_level = parseInt(index / 2);
                    vertical_level = vertical_level * 38;
                }

                $wizard.find('.moving-tab').css('width', step_width);
                $('.moving-tab').css({
                    'transform': 'translate3d(' + move_distance + 'px, ' + vertical_level + 'px, 0)',
                    'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

                });
            }
        });
    </script>
@stop