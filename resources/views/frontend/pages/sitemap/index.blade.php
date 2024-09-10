@extends('frontend.layout.app3')
@section('content')



<div class="main-wrapper">

    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                           Home/Sitemap
                    </nav>
                    <h2 class="breadcrumb-title">Sitemap</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card" align="center">
                        <div class="card-body custom-border-card pb-0">

                            <div class="widget about-widget custom-about mb-0">
                                <h4 class="widget-title">Homepage</h4>
                                <hr/>
                                <p>
                                    <img src="{{ asset('mentoring-frontend\assets\img\homepage-sitemap.png') }}" style="max-width: 100%; height: auto;">
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="card" align="center">
                        <div class="card-body custom-border-card pb-0">

                            <div class="widget about-widget custom-about mb-0">
                                <h4 class="widget-title">Dashboard</h4>
                                <hr/>
                                <p>
                                    <img src="{{ asset('mentoring-frontend\assets\img\dashboard-sitemap.png') }}" style="max-width: 100%; height: auto;">
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
