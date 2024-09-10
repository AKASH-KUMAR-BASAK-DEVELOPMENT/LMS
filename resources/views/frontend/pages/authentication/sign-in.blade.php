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

<div class="bg-pattern-style">
    <div class="content">

        <div class="account-content">
            <div class="account-box">
                <div class="login-right">
                    <div class="login-header">
                        <div style="display: flex; align-items: center;">
                                <span class="mb-0 fs-1">
                                    <lottie-player src="{{ asset('frontend-1/assets/lottifiles/Animation - 1716786872050.json') }}" speed="1" style="width: 50px; height: 50px;" loop autoplay direction="1" mode="normal"></lottie-player>
                                </span>
                        </div>
                        <h3>Login <span>{{ company()->name }}</span></h3>
                        <p class="text-muted">Access to our dashboard</p>
                    </div>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <div class="pass-group">
                                <input type="password" class="form-control pass-input" name="password" required>
                                <span class="fas fa-eye toggle-password"></span>
                            </div>
                        </div>
                        <div class="text-end">
                            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                        </div>
                        <button class="btn btn-primary login-btn" type="submit">Login</button>
                        <div class="text-center dont-have">Don’t have an account? <a href="/sign-up-form">Signup</a></div>
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
