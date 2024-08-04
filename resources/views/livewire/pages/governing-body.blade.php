<div>
    <x-breadcrumb title="Govering Body" />

    @if ($governings)
        <!-- teacher details widget start here-->
        <section class="bd-teacher-widget-area pb-70 pt-120">
            <div class="container">
                <div class="row align-items-start">
                    @foreach ($governings as $key => $governing)
                        @if ($key % 2 == 0)
                            <div class="col-lg-6 mb-80">
                                <div class="bd-teacher-widget wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-thumb p-relative">
                                        <img src="{{ getAssetUrl($governing->image, 'uploads/promos') }}"
                                            alt="{{ $governing->title }}">
                                        <div class="panel wow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-80">
                                <div class="bd-teacher-widget theme-bg-6 wow fadeInRight" data-wow-duration="1s"
                                    data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-content">
                                        <h3 class="bd-teacher-widget-title">{{ $governing->title }}</h3>
                                        <span class="bd-teacher-widget-tag">Teacher</span>
                                        <p>{!! $governing->description !!}</p>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6 mb-80 order-lg-2">
                                <div class="bd-teacher-widget wow fadeInRight" data-wow-duration="1s"
                                    data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-thumb p-relative">
                                        <img src="{{ getAssetUrl($governing->image, 'uploads/promos') }}"
                                            alt="{{ $governing->title }}">
                                        <div class="panel wow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-80 order-lg-1">
                                <div class="bd-teacher-widget theme-bg-6 wow fadeInLeft" data-wow-duration="1s"
                                    data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-content">
                                        <h3 class="bd-teacher-widget-title">{{ $governing->title }}</h3>
                                        <span class="bd-teacher-widget-tag">Teacher</span>
                                        <p>{!! $governing->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- teacher details widget end here-->
    @endif
</div>
