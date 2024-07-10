@props(['title' => 'Title', 'home'=>'Home'])
<!-- breadcrumb area start here -->
<section class="bd-breadcrumb-area p-relative fix theme-bg">
    <!-- breadcrumb background image -->
    <div class="bd-breadcrumb-bg" data-background="{{ asset('frontend') }}/assets/img/bg/breadcrumb-bg.jpg"></div>
    <div class="bd-breadcrumb-wrapper mb-60 p-relative">
        <div class="container">
            <div class="bd-breadcrumb-shape d-none d-sm-block p-relative">
                <div class="bd-breadcrumb-shape-1">
                    <img src="{{ asset('frontend') }}/assets/img/shape/curved-line-2.png" alt="img not found!">
                </div>
                <div class="bd-breadcrumb-shape-2">
                    <img src="{{ asset('frontend') }}/assets/img/shape/white-curved-line.png" alt="img not found!">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                        <div class="bd-breadcrumb-content text-center">
                            <h1 class="bd-breadcrumb-title">{{$title}}</h1>
                            <div class="bd-breadcrumb-list">
                                <span><a href="{{ route('front.index') }}"><i class="flaticon-hut"></i>{{$home}}</a></span>
                                <span>{{$title}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bd-wave-wrapper bd-wave-wrapper-3">
        <div class="bd-wave bd-wave-3"></div>
        <div class="bd-wave bd-wave-3"></div>
    </div>
</section>
<!-- breadcrumb area end here  -->
