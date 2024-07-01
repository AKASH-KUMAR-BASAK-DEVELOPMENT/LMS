<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/adminty-html/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Dec 2023 12:48:32 GMT -->
<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>


    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="{{ asset('files/assets/images/favicon.ico') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/themify-icons/themify-icons.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/icofont/css/icofont.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/style.css') }}">
</head>
<body class="fix-menu">

<div class="theme-loader">
    <div class="ball-scale">
        <div class="contain">
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>

<section class="login-block">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center">
                        <img src="{{ asset('files/assets/images/logo.png') }}" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Sign In</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="Your Email Address">
                                <span class="form-bar"></span>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required placeholder="Password">
                                <span class="form-bar"></span>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary d-">
                                        <label>
                                            <input type="checkbox" value>
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-right f-right">
                                        <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot
                                            Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
                                        in</button>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-inverse text-left m-b-0">Thank you.</p>
                                    <p class="text-inverse text-left"><a href="/"><b class="f-w-600">Back
                                                to website</b></a></p>
                                </div>
                                <div class="col-md-2">
                                    <img src="{{ asset('files/assets/images/auth/Logo-small-bottom.png') }}" alt="small-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</section>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ asset('files/assets/images/browser/chrome.png') }}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ asset('files/assets/images/browser/firefox.png') }}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ asset('files/assets/images/browser/opera.png') }}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ asset('files/assets/images/browser/safari.png') }}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ asset('files/assets/images/browser/ie.png') }}" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script type="text/javascript" src="{{ asset('files/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('files/bower_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<script type="text/javascript" src="{{ asset('files/bower_components/modernizr/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/bower_components/modernizr/feature-detects/css-scrollbars.js') }}"></script>

<script type="text/javascript" src="{{ asset('files/bower_components/i18next/i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/bower_components/jquery-i18next/jquery-i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/assets/js/common-pages.js') }}"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/adminty-html/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Dec 2023 12:48:32 GMT -->
</html>

