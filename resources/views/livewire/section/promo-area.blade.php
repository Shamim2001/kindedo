<!-- promotion area start here  -->
<section class="bd-promotion-area pb-60  pt-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="bd-promotion-thumb-wrapper mb-60">
                    <div class="bd-promotion-thumb">
                        <div class="bd-promotion-thumb-mask p-relative wow fadeInLeft" data-wow-delay=".3s"
                            data-wow-duration="1">
                            <img src="{{ getAssetUrl($promo->image, 'uploads/promos') }}" alt="Image not found">
                            <div class="panel wow"></div>
                        </div>
                    </div>
                    <div class="bd-promotion-shape d-none d-lg-block">
                        <img src="{{ asset('frontend') }}/assets/img/shape/tripple-line.png" alt="Shape not found">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="bd-promotion mb-60 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="bd-section-title-wrapper mb-35">
                        <h2 class="bd-section-title mb-10">{{ $promo->title }}</h2>
                        <p>{{ $promo->description }}</p>
                    </div>
                    {{-- <div class="bd-promotion-counter-wrapper mb-40">
                        <div class="bd-promotion-counter">
                            <div class="bd-promotion-counter-number">
                                <p><span class="counter">14</span>+</p>
                            </div>
                            <div class="bd-promotion-counter-text">
                                <span>Years of</span>
                                <span>experience</span>
                            </div>
                        </div>
                        <div class="bd-promotion-counter">
                            <div class="bd-promotion-counter-number">
                                <p><span><span class="counter">7</span>K</span>+</p>
                            </div>
                            <div class="bd-promotion-counter-text">
                                <span>Students</span>
                                <span>each year</span>
                            </div>
                        </div>
                        <div class="bd-promotion-counter">
                            <div class="bd-promotion-counter-number">
                                <p><span class="counter">15</span>+</p>
                            </div>
                            <div class="bd-promotion-counter-text">
                                <span>Award</span>
                                <span>Wining</span>
                            </div>
                        </div>
                    </div>
                    <div class="bd-promotion-list mb-50">
                        <ul>
                            <li>We believe every child is intelligent so we care.</li>
                            <li>Teachers make a difference of your child.</li>
                        </ul>
                    </div> --}}
                    <div class="bd-promotion-btn-wrapper flex-wrap">
                        <div class="bd-promotion-btn">
                            <a href="{{ route('front.about') }}" class="bd-btn">
                                <span class="bd-btn-inner">
                                    <span class="bd-btn-normal">View More</span>
                                    <span class="bd-btn-hover">View More</span>
                                </span>
                            </a>
                        </div>
                        <div class="bd-promotion-btn-2 bd-pulse-btn btn-2">
                            <a href="{{ $promo->video_url }}" class="popup-video"><i
                                    class="flaticon-play-button"></i> Promotional Video</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- promotion area end here  -->
