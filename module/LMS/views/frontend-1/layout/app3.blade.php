<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mentoring.dreamstechnologies.com/laravel/template/public/index-2 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2024 15:45:53 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Mentoring</title>

    <link type="image/x-icon" href="{{ asset(company()->favicon) }}" rel="icon">

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
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/css/custom-style.css') }}">
</head>


@include('frontend-1.partials.header3')

@yield('content')


@include('frontend-1.partials.footer3')

<!--Website Robot-->
<div id="fixed-element">
    <span onclick="robotSupport()"><lottie-player src="{{ asset('frontend-1/assets/lottifiles/Animation - 1716786872050.json') }}" speed="1" class="robot-support" loop autoplay direction="1" mode="normal"></lottie-player></span>
    <div id="support-list">
        <ul>
            <li>LMS Support</li>
            <li>Helpline</li>
            <li>FAQ</li>
        </ul>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('global-audio/thoribass__notification1.wav') }}" type="audio/wav">
    <!-- Include additional source elements for different audio formats if needed -->
    Your browser does not support the audio element.
</audio>

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
<script src="{{ asset('frontend-1/assets/js/axios.min.js') }}"></script>
<script src="{{ asset('global-js/pop-notification.js') }}"></script>
<script src="{{ asset('global-js/live-search-auto-suggest.js') }}"></script>
<script src="{{ asset('global-js/support-robot.js') }}"></script>
<script src="{{ asset('frontend-1/assets/js/lottie-player.js') }}"></script>
<script>
    const ws = new WebSocket('ws://192.168.0.120:3000');

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
<!-- Mirrored from mentoring.dreamstechnologies.com/laravel/template/public/index-2 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2024 15:47:39 GMT -->
</html>
