<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from eduport.webestica.com/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Dec 2023 12:19:37 GMT -->
<head>
    <title>{{ company()->title }}</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Eduport- LMS, Education and Course Theme">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(company()->favicon) }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend-1/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/tiny-slider/tiny-slider.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/choices/css/choices.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/vendor/glightbox/css/glightbox.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend-1/assets/vendor/stepper/css/bs-stepper.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-1/assets/css/custom-style.css') }}">
    <style>
        #fixed-element {
            position: fixed;
            bottom: 10px;
            left: 10px;
            padding: 10px;
            border-radius: 5px;
            z-index: 9999;
        }

        @media (max-width: 600px) {
            #fixed-element {
                bottom: 5px;
                left: 5px;
                padding: 8px;
            }
        }

        #support-list {
            display: none; /* Hide the list initially */
            position: absolute;
            bottom: 20px; /* Adjust as needed */
            left: 60px;
            width: auto;
            font-size: 12px;
            color: #ffffff;
            background-color: rgba(0, 0, 0, 0.5);
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            white-space: nowrap;
        }

        #support-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #support-list li {
            margin: 5px 0;
        }
        #support-list li:hover {
            cursor: pointer;
            color: #ffd200;
        }

        .robot-support {
            width: 50px;
            height: 50px;
            cursor: pointer;
        }

    </style>
    <style>
        #autofill ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #autofill ul li {
            padding: 5px;
            cursor: pointer;
        }
    </style>

    @stack('styles')
</head>

<body>

@include('frontend-1.partials.header2')
<main>
    @yield('content')
</main>
@include('frontend-1.partials.footer2')

<!-- Cookie alert box START -->
{{--<div--}}
{{--    class="alert alert-light fade show position-fixed start-0 bottom-0 z-index-99 rounded-3 shadow p-4 ms-3 mb-3 col-10 col-md-4 col-lg-3 col-xxl-2"--}}
{{--    role="alert">--}}
{{--    <div class="text-dark text-center">--}}
{{--        <!-- Image -->--}}
{{--        <img src="{{ asset('frontend-1/assets/images/element/27.svg') }}" class="h-50px mb-3" alt="cookie">--}}
{{--        <!-- Content -->--}}
{{--        <p class="mb-0">This website stores cookies on your computer. To find out more about the cookies we use, see our--}}
{{--            <a class="text-dark" href="#"><u> Privacy Policy</u></a></p>--}}
{{--        <!-- Buttons -->--}}
{{--        <div class="mt-3">--}}
{{--            <button type="button" class="btn btn-success-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">Accept</span>--}}
{{--            </button>--}}
{{--            <button type="button" class="btn btn-danger-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">Decline</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Cookie alert box END -->


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


<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<audio id="notificationSound">
    <source src="{{ asset('global-audio/thoribass__notification1.wav') }}" type="audio/wav">
    <!-- Include additional source elements for different audio formats if needed -->
    Your browser does not support the audio element.
</audio>

<!-- Bootstrap JS -->
<script src="{{ asset('frontend-1/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

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
    const ws = new WebSocket('ws://studyonline.buildinginstitute.edu.au:3001');

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
