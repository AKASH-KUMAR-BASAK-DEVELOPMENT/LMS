<!-- =======================
Footer START -->
<footer class="pt-0 bg-blue rounded-4 position-relative mx-2 mx-md-4 mb-3">
    <!-- SVG decoration for curve -->
    <figure class="mb-0">
        <svg class="fill-body rotate-180" width="100%" height="150" viewBox="0 0 500 150" preserveAspectRatio="none">
            <path d="M0,150 L0,40 Q250,150 500,40 L580,150 Z"></path>
        </svg>
    </figure>

    <div class="container">
        <div class="row mx-auto">
            <div class="col-lg-6 mx-auto text-center my-5">
                <!-- Logo -->
                <img class="mx-auto h-100px" src="{{ asset(company()->footer_logo) }}" alt="logo">
                <p class="mt-3 text-white">{{ company()->short_description }}</p>
                <!-- Links -->
                <ul class="nav justify-content-center text-primary-hover mt-3 mt-md-0">
                    <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Terms & Policy</a></li>
                    {{--                    <li class="nav-item"><a class="nav-link text-white" href="#">Privacy</a></li>--}}
                    {{--                    <li class="nav-item"><a class="nav-link text-white" href="#">Career</a></li>--}}
                    <li class="nav-item"><a class="nav-link text-white" href="/contact">Contact us</a></li>
                </ul>
                <!-- Social media button -->
                <ul class="list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-white btn-sm shadow px-2 text-facebook" href="http://{{ company()->facebook_page_link }}">
                            <i class="fab fa-fw fa-facebook-f"></i>
                        </a>
                    </li>
                    {{--                    <li class="list-inline-item">--}}
                    {{--                        <a class="btn btn-white btn-sm shadow px-2 text-instagram" href="http://{{ company()->instagram_link }}">--}}
                    {{--                            <i class="fab fa-fw fa-instagram"></i>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    <li class="list-inline-item">
                        <a class="btn btn-white btn-sm shadow px-2 text-twitter" href="http://{{ company()->twitter_link }}">
                            <i class="fab fa-fw fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-white btn-sm shadow px-2 text-linkedin" href="http://{{ company()->linkedin_link }}">
                            <i class="fab fa-fw fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
                <!-- Bottom footer link -->
                <div class="mt-3 text-white">{{ company()->copyright }}</div>
            </div>
        </div>
    </div>
</footer>
<!-- =======================
Footer END -->
