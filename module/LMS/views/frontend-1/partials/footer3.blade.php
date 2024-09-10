<footer class="footer footer-one">

    <div class="footer-top aos " data-aos="fade-up">
        <div class="container">
            <div class="course-two-bg">
                <img src="{{ asset('mentoring-frontend/assets/img/bg/home-two-bg-14.png') }}" class="img-fluid feature-bgone" alt>
                <img src="{{ asset('mentoring-frontend/assets/img/bg/home-two-bg-13.png') }}" class="img-fluid feature-bgtwo" alt>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4">

                    <div class="footer-widget footer-menu">
                        <span class="company-logo">
                            <img src="{{ asset(company()->logo) }}" class="footer-logo-custom1">
                        </span>
                        <br>
                        <ul>
                            <li><a href="javascript:void(0)"><i class="fa fa-address-book"></i> {{ company()->address }}</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-phone"></i> {{ company()->phone_primary }}</a></li>
{{--                            <li><a href="dashboard.html"><i class="fa fa-envelope"></i> {{ company()->email }}</a></li>--}}
                        </ul>
                    </div>

                </div>
                <div class="col-lg-2 col-md-4">

                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">E-Learn</h2>
                        <ul>
                            <li><a href="/course-frontend">Courses</a></li>
                            <li><a href="/sign-up-form">Course Category</a></li>
                            <li><a href="dashboard.html">Course Enrollment</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-2 col-md-4">

                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Authorization</h2>
                        <ul>
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/sign-in">Login</a></li>
                            <li><a href="/sign-up-form">Register</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Quick Links</h2>
                        <ul>
                            <li><a href="{{ route('sitemap.index') }}">Sitemap</a></li>
                            <li><a href="{{ route('feature.index') }}">Featured</a></li>
                            <li><a href="/contact">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">

                    <div class="footer-widget footer-subscribe bg-subscribe">
                        <h2 class="footer-title">Subscribe</h2>

                        <div class="footer-mail">
                            <form action="https://mentoring.dreamstechnologies.com/laravel/template/public/search')}}">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email Address">
                                </div>
                                <div class="input-group">
                                    <a href class="btn btn-primary w-100">Subscribe</a>
                                </div>
                            </form>
                        </div>

                        <p class="subscribe-text">{{ company()->short_description }}</p>
                        <ul class="social-icon">
                            <li>
                                <a href="http://{{ company()->facebook_page_link }}" class="social-icon-space d-flex align-items-center justify-content-center" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="http://{{ company()->instagram_link }}" class="social-icon-space d-flex align-items-center justify-content-center" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="http://{{ company()->linkedin_link }}" class="social-icon-space d-flex align-items-center justify-content-center" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="http://{{ company()->twitter_link }}" class="social-icon-space d-flex align-items-center justify-content-center" target="_blank"><i class="fab fa-twitter"></i> </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom ">
        <div class="container">

            <div class="copyright-border"></div>
            <div class="copyright ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-4">
                        <div class="copyright-text">
                            <p class="mb-0">{{ company()->copyright }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="term-privacy">
                            <div class="bottom-links">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" style="visibility: hidden">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" style="visibility: hidden">Become a Mentor</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" style="visibility: hidden">Become a Mentee</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">About</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">All Courses</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Help</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</footer>
