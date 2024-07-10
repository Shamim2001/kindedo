<!-- faq area start here  -->
<section class="bd-faq-area pt-120 pb-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="bd-faq-content-2 mb-60 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="bd-section-title-wrapper mb-25">
                        <h2 class="bd-section-title mb-0">{{ $faqs[0]->title }}</h2>
                    </div>
                    <div class="bd-faq">
                        <div class="accordion" id="accordionExample">

                            @foreach ($faqs->take(4) as $key => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo-{{ $key }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo-{{$key}}" aria-expanded="{{ $key == 0 ? 'true' : 'false'}}"
                                            aria-controls="collapseTwo-{{$key}}">
                                            {{ $faq->name }}
                                        </button>
                                    </h2>
                                    <div id="collapseTwo-{{$key}}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : ''}}"
                                        aria-labelledby="headingTwo-{{ $key }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $faq->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Which is the best preschool for your child ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{ $faq->child_desc }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        What is the toution fee on first year?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{ $faq->year_desc }}</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="bd-faq-thumb-wrapper mb-70">
                    <div class="bd-faq-thumb">
                        <div class="bd-faq-thumb-mask p-relative wow fadeInRight" data-wow-duration="1s"
                            data-wow-delay=".3s">
                            <img src="{{ getAssetUrl($faqs[0]->image, 'faqs') }}" alt="Image not found">

                            <div class="panel-2 wow"></div>
                        </div>
                    </div>
                    <div class="bd-faq-shape d-none d-lg-block">
                        <img src="{{ asset('frontend') }}/assets/img/shape/tripple-line.png" alt="Shape not found">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq area end here  -->
