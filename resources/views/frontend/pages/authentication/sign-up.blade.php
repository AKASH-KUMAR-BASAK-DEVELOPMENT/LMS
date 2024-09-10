
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mentoring.dreamstechnologies.com/laravel/template/public/index-2 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2024 15:45:53 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Mentoring</title>

    <link type="image/x-icon" href="{{ asset('mentoring-frontend/assets/img/favicon.png') }}" rel="icon">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/plugins/slick/slick-theme.css') }}">

    <link rel="stylesheet" href="{{ asset('mentoring-frontend/assets/css/style.css') }}">
</head>


<body class="account-page">

<div class="bg-pattern-style bg-pattern-style-register">
    <div class="content">

        <div class="account-content">
            <div class="account-box">
                <div class="login-right">
                    <div class="login-header">
                        <div style="display: flex; align-items: center;">
                                <span class="mb-0 fs-1">
                                    <lottie-player src="{{ asset('frontend-1/assets/lottifiles/Animation - 1716786872050.json') }}" speed="1" style="width: 50px; height: 50px;" loop autoplay direction="1" mode="normal"></lottie-player>
                                </span>
                            <span>
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                        </div>
                                @endif
                                </span>
                        </div>
                        <h3><span>{{ company()->name }}</span> SIGN-UP</h3>
                        <p class="text-muted">Access to our dashboard</p>
                    </div>

                    <form  action="{{ route('sign-up') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Role</label>
                                    <select class="form-control border-0 bg-light rounded-end ps-1" name="role_id">
                                        @foreach($roles as $role)
                                            @if($role->id == 4)
                                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Email Address</label>
                            <input id="email" type="email" name="email" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
{{--                            <div class="custom-control custom-control-xs custom-checkbox">--}}
{{--                                <input type="checkbox" class="custom-control-input" name="agreeCheckboxUser" id="agree_checkbox_user">--}}
{{--                                <label class="custom-control-label" for="agree_checkbox_user">I agree to Mentoring</label> <a tabindex="-1" href="javascript:void(0);">Privacy Policy</a> &amp; <a tabindex="-1" href="javascript:void(0);"> Terms.</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button class="btn btn-primary login-btn" type="submit">Signup</button>
                        <div class="account-footer text-center mt-3">
                            Already have an account? <a class="forgot-link mb-0" href="/sign-in">Login</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

</div>


<script src="{{ asset('mentoring-frontend/assets/js/jquery-3.7.1.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>

<script src="{{ asset('mentoring-frontend/assets/js/bootstrap.bundle.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>

<script src="{{ asset('mentoring-frontend/assets/plugins/select2/js/select2.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>

<script src="{{ asset('mentoring-frontend/assets/js/moment.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>
<script src="{{ asset('mentoring-frontend/assets/js/bootstrap-datetimepicker.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>
<script src="{{ asset('mentoring-frontend/assets/plugins/daterangepicker/daterangepicker.js') }}"
        type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>

<script src="{{ asset('mentoring-frontend/assets/js/owl.carousel.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>

<script src="{{ asset('mentoring-frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"
        type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>
<script src="{{ asset('mentoring-frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
        type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>


<script src="{{ asset('mentoring-frontend/assets/js/jquery.waypoints.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>
<script src="{{ asset('mentoring-frontend/assets/js/jquery.counterup.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>

<script src="{{ asset('mentoring-frontend/assets/js/feather.min.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>

<script src="{{ asset('mentoring-frontend/assets/plugins/aos/aos.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>
<script src="{{ asset('mentoring-frontend/assets/js/script.js') }}" type="54d4cc78a68b5d3e3caa2071-text/javascript"></script>
</body>
<script src="{{ asset('mentoring-frontend/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="54d4cc78a68b5d3e3caa2071-|49" defer></script>
<script src="{{ asset('frontend-1/assets/js/lottie-player.js') }}"></script>
<!-- Mirrored from mentoring.dreamstechnologies.com/laravel/template/public/index-2 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2024 15:47:39 GMT -->
</html>

