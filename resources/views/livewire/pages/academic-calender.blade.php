<div>
    <x-breadcrumb title="Academic Calender" />

    @if ($academic)
        <!-- routine area start here  -->
        <section class="bd-routine-2-area pt-120 pb-95">
            <div class="container">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="bd-section-title-wrapper text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                                data-wow-delay=".2s">
                                <h2 class="bd-section-title mb-0">{{ env('APP_NAME'), $academic->name }} </h2>
                                <p>Our multi-level kindergarten programs cater to the age group of 2-5 years<br> with a
                                    curriculum
                                    focussing children.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bd-routine-2-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                    <div class="row">
                        <div class="col-12">
                            <div class="bd-routine-2">
                                <img src="{{ getAssetUrl($academic->image, 'uploads/courses') }}" alt="{{ $academic->name }}">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- routine area end here  -->
    @endif
</div>
