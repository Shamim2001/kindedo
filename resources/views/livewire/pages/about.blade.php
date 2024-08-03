<div>
    <x-breadcrumb title="About" />

    <!-- promotion area start here  -->
    @foreach ($abouts as $key => $about)
        <section class="bd-promotion-area pt-90 {{ $loop->last ? 'pb-60' : '' }}">
            <div class="container">
                <div class="row align-items-center">
                    @if ($key % 2 == 0)
                        <!-- Even index: image on the left -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="bd-promotion-thumb-wrapper mb-60 wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay=".3s">
                                <div class="bd-promotion-thumb">
                                    <div class="bd-promotion-thumb-mask p-relative">
                                        <img src="{{ getAssetUrl($about->image, 'uploads/promos') }}"
                                            alt="{{ $about->title }}">
                                        <div class="panel wow"></div>
                                    </div>
                                </div>
                                <div class="bd-promotion-shape d-none d-lg-block">
                                    <img src="{{ asset('frontend') }}/assets/img/shape/tripple-line.png"
                                        alt="Shape not found">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="bd-promotion mb-60 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-section-title-wrapper mb-35">
                                    <h2 class="bd-section-title mb-10">{{ $about->title }}</h2>
                                    <p>{!! $about->description !!}</p>
                                </div>
                                <div class="bd-promotion-btn-wrapper flex-wrap">
                                    <div class="bd-promotion-btn">
                                        <a href="#" class="bd-btn">
                                            <span class="bd-btn-inner">
                                                <span class="bd-btn-normal">View More</span>
                                                <span class="bd-btn-hover">View More</span>
                                            </span>
                                        </a>
                                    </div>
                                    @if ($about->video_url)
                                        <div class="bd-promotion-btn-2 bd-pulse-btn btn-2">
                                            <a href="{{ $about->video_url }}" class="popup-video"><i
                                                    class="flaticon-play-button"></i> Promotional Video</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Odd index: image on the right -->
                        <div class="col-xl-6 col-lg-6 order-lg-2">
                            <div class="bd-promotion-thumb-wrapper mb-60 wow fadeInRight" data-wow-duration="1s"
                                data-wow-delay=".3s">
                                <div class="bd-promotion-thumb">
                                    <div class="bd-promotion-thumb-mask p-relative">
                                        <img src="{{ getAssetUrl($about->image, 'uploads/promos') }}"
                                            alt="{{ $about->title }}">
                                        <div class="panel wow"></div>
                                    </div>
                                </div>
                                <div class="bd-promotion-shape d-none d-lg-block">
                                    <img src="{{ asset('frontend') }}/assets/img/shape/tripple-line.png"
                                        alt="Shape not found">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 order-lg-1">
                            <div class="bd-promotion mb-60 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-section-title-wrapper mb-35">
                                    <h2 class="bd-section-title mb-10">{{ $about->title }}</h2>
                                    <p>{!! $about->description !!}</p>
                                </div>
                                <div class="bd-promotion-btn-wrapper flex-wrap">
                                    <div class="bd-promotion-btn">
                                        <a href="#" class="bd-btn">
                                            <span class="bd-btn-inner">
                                                <span class="bd-btn-normal">View More</span>
                                                <span class="bd-btn-hover">View More</span>
                                            </span>
                                        </a>
                                    </div>
                                    @if ($about->video_url)
                                        <div class="bd-promotion-btn-2 bd-pulse-btn btn-2">
                                            <a href="{{ $about->video_url }}" class="popup-video"><i
                                                    class="flaticon-play-button"></i> Promotional Video</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    <!-- promotion area end here  -->

    <!-- testimonial area start here  -->
    <section class="bd-testimonial-area-2 pb-120 p-relative pt-120 theme-bg">
        <div class="bd-testimonial-bottom-shape">
            <img src="assets/img/shape/wave-section-break.png" alt="img not found!">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bd-section-title-wrapper is-white z-index-1 p-relative text-center mb-55 wow fadeInUp"
                        data-wow-duration="1s" data-wow-delay=".3s">
                        <h2 class="bd-section-title mb-0">Parents Says</h2>
                        <p>With the help of teachers and the environment as the third teacher, students<br> have
                            opportunities to confidently take risks.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bd-testimonial-active-2 swiper-container wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".5s">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="bd-testimonial-2 mr-5 theme-bg-6 mb-25">
                                    <div class="bd-testimonial-rating mb-30">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                    <div class="bd-testimonial-content-2 mb-35">
                                        <p>Happy Christmas to the whole Kindedo from everyone at Monkton. A big thank
                                            you to
                                            Kindedo pupil Will who lent his Kindedo to this card, it's very usefull for
                                            children, join kindedo for better future.</p>
                                    </div>
                                    <div class="bd-testimonial-avatar d-flex align-items-center">
                                        <div class="bd-testimonial-avatar-thumb">
                                            <img src="assets/img/testimonials/1.png" alt="testimonial avatar">
                                        </div>
                                        <h6 class="bd-testimonial-avatar-title-2 mb-0">Norma J. Johnston</h6>
                                        <div class="bd-testimonial-quote d-none d-sm-block clr-2">
                                            <i class="flaticon-quote"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bd-testimonial-2 mr-5 clr-3 theme-bg-7">
                                    <div class="bd-testimonial-rating mb-30">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                    <div class="bd-testimonial-content-2 mb-35">
                                        <p>Your child will laugh, play and explore at Summer at MLS. From soccer, water
                                            play, art, music, theater and science, Shabbat celebrations, cooking, they
                                            will love
                                            our academy, kindedo is best.</p>

                                    </div>
                                    <div class="bd-testimonial-avatar d-flex align-items-center">
                                        <div class="bd-testimonial-avatar-thumb">
                                            <img src="assets/img/testimonials/2.png" alt="testimonial avatar">
                                        </div>
                                        <h6 class="bd-testimonial-avatar-title-2 mb-0">Robert M. Allen</h6>
                                        <div class="bd-testimonial-quote d-none d-sm-block clr-1">
                                            <i class="flaticon-quote"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider dots pagination -->
                    <div class="bd-testimonial-pagination-2 bd-dots-pagination justify-content-center wow fadeInUp"
                        data-wow-duration="1s" data-wow-delay=".3s"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end here  -->

    <!-- teacher area start here  -->
    <section class="bd-teacher-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bd-section-title-wrapper text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".3s">
                        <h2 class="bd-section-title mb-0">Our Best Teachers</h2>
                        <p>With the help of teachers and the environment as the third teacher, students<br> have
                            opportunities to confidently take risks.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bd-teacher-active swiper-container wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".5s">
                        <div class="swiper-wrapper">
                            @foreach ($teachers as $teacher)
                            <div class="swiper-slide">
                                <div class="bd-teacher">
                                    <a href="teacher-details.html">
                                        <div class="bd-teacher-thumb">
                                            <img src="{{ $teacher->photo }}" alt="{{ $teacher->name }}">
                                        </div>
                                    </a>
                                    <div class="bd-teacher-content-wrapper">
                                        <div class="bd-teacher-content">
                                            <h4 class="bd-teacher-title"><a href="">{{ $teacher->name }}</a>
                                            </h4>
                                            <span class="bd-teacher-des text-capitalize">{{ $teacher->role }}</span>
                                        </div>
                                        <div class="bd-teacher-social">
                                            <ul>
                                                <li>
                                                    <a target="_blank" href="https://www.facebook.com/"><i
                                                            class="fa-brands fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="https://twitter.com/"><i
                                                            class="fa-brands fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="https://www.youtube.com/"><i
                                                            class="fa-brands fa-youtube"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- teacher slider dots pagination  -->
                    <div class="bd-teacher-pagination bd-dots-pagination wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".3s">
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- teacher area end here  -->
</div>
