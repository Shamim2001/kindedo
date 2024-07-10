<!-- gallery area start here  -->
<section class="bd-gallery-area p-relative pt-120 pb-60 theme-bg-6 p-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bd-section-title-wrapper mb-55 text-center wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay=".3s">
                    <h2 class="bd-section-title mb-0">See our gallery</h2>
                    <p>It is our goal to provide age appropriate opportuniy for every child enrolled in Kindedo Kids
                        Club
                        enrichment classes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="bd-gallery-active swiper-container wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay=".5s">
                    <div class="swiper-wrapper">
                        @foreach ($galleries as $gallery)
                            <div class="swiper-slide">
                                <div class="bd-gallery">
                                    <div class="bd-gallery-thumb-wrapper">
                                        <div class="bd-gallery-thumb">
                                            <img src="{{ getAssetUrl($gallery->name, 'programs') }}" alt="img not found!">
                                        </div>
                                        <div class="bd-gallery-icon">
                                            <a href="{{ getAssetUrl($gallery->name, 'programs') }}" class="popup-image"><i
                                                    class="flaticon-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="swiper-slide">
                            <div class="bd-gallery">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ asset('frontend') }}/assets/img/gallery/1.png" alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ asset('frontend') }}/assets/img/gallery/1.png" class="popup-image"><i
                                                class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="bd-gallery">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ asset('frontend') }}/assets/img/gallery/2.png" alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ asset('frontend') }}/assets/img/gallery/2.png" class="popup-image"><i
                                                class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="bd-gallery">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ asset('frontend') }}/assets/img/gallery/3.png" alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ asset('frontend') }}/assets/img/gallery/3.png" class="popup-image"><i
                                                class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="bd-gallery">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ asset('frontend') }}/assets/img/gallery/4.png" alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ asset('frontend') }}/assets/img/gallery/4.png" class="popup-image"><i
                                                class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- program slider dots pagination  -->
                <div class="bd-gallery-pagination bd-dots-pagination fill-pagination wow fadeInUp"
                    data-wow-duration="1s" data-wow-delay=".4s"></div>
            </div>
        </div>
    </div>
</section>
<!-- gallery area end here  -->
