<!-- =======================
    Client START -->
<section class="pb-0 pb-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Slider START -->
                <div class="tiny-slider">
                    <div class="tiny-slider-inner" data-arrow="false" data-dots="false" data-gutter="80" data-items-xl="6" data-items-lg="5" data-items-md="4" data-items-sm="3" data-items-xs="2" data-autoplay="2000">
                        <!-- Slide item START -->
                        @foreach($partners as $partner)
                            <div class="item"> <img class="grayscale" src="{{ asset($partner->image) }}" alt="client-logo"> </div>
                        @endforeach
                        <!-- Slide item END -->
                    </div>
                </div>
                <!-- Slider END -->
            </div>
        </div>
    </div>
</section>
<!-- =======================
Client END -->
