<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ company()->title}}</title>


    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords"
          content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="{{ asset(company()->favicon) }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <link href="{{ asset('files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css"
          rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/jquery.steps/demo/css/jquery.steps.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/css/custom-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend-1/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/tiny-slider/tiny-slider.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/choices/css/choices.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/glightbox/css/glightbox.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend-1/assets/vendor/stepper/css/bs-stepper.min.css') }}">

    <script src="https://cdn.tiny.cloud/1/ml0yvwgkw4861c2l04q0vsffgpzwnjmteianxfxgjk13dee8/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#tinyTextarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
    @stack('styles')
</head>

<body>

@include('frontend-1.partials.loader')

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        @include('frontend-1.partials.header')
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                @include('frontend-1.partials.sidebars.sidebar')
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    @yield('content')
                                </div>
                            </div>
                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                    @include('frontend-1.partials.footer')
                </div>
            </div>
        </div>
    </div>
</div>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="./files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="./files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="./files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="./files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="./files/assets/images/browser/ie.png" alt="">
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

{{--<script src="{{ asset('files/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>--}}
{{--<script src="{{ asset('files/assets/pages/filer/custom-filer.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('files/assets/pages/filer/jquery.fileuploads.init.js') }}" type="text/javascript"></script>--}}


<script src="{{ asset('files/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('files/assets/js/vartical-layout.min.js') }}"></script>
<script src="{{ asset('files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('files/assets/js/script.min.js') }}"></script>
<script src="{{ asset('frontend-1/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>s
<!-- Vendors -->
<script src="{{ asset('frontend-1/assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
<script src="{{ asset('frontend-1/assets/vendor/choices/js/choices.min.js') }}"></script>
<script src="{{ asset('frontend-1/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend-1/assets/vendor/glightbox/js/glightbox.js') }}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{ asset('frontend-1/assets/vendor/stepper/js/bs-stepper.min.js') }}"></script>

<!-- Template Functions -->
<script src="{{ asset('frontend-1/assets/js/functions.js') }}"></script>
<script src="{{ asset('frontend-1/assets/js/axios.min.js') }}"></script>
<script src="{{ asset('frontend-1/assets/js/lottie-player.js') }}"></script>

<!-- Global Js -->
<script src="{{ asset('global-js/support-robot.js') }}"></script>
<script src="{{ asset('global-js/live-search-auto-suggest.js') }}"></script>
<script>
    const ws = new WebSocket('ws://192.168.68.132:3000');

    ws.onopen = () => {
        console.log('Connected to WebSocket server');
    };

    ws.onmessage = event => {
        const data = JSON.parse(event.data);
        const userId = data[0].user_id;
            @auth
        const authUserId = {{ auth()->user()->id }};
        if(authUserId == userId){
            playNotificationSound();
            showToast(message='Your Course Request Accepted!', duration=5000, bgColor='#147f00', textColor='#fff');
        }
        @endauth
    };

</script>
{{--<script src="{{ asset('global-js/websocket-receiver.js') }}"></script>--}}
<script src="{{ asset('global-js/pop-notification.js') }}"></script>
<script>
    function playNotificationSound() {
        var notificationSound = document.getElementById("notificationSound");
        if (notificationSound) {
            notificationSound.currentTime = 0;
            notificationSound.play();
        }
    }

</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(sendPositionToServer);
        } else {
            console.log('Geolocation is not supported by this browser.');
        }
    });

    function sendPositionToServer(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
    }
</script>
</body>
</html>
