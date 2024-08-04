<div>
    <x-breadcrumb title="Teacher Panel" />


    @if ($teachers)
        <!-- teacher area start here  -->
        <section class="bd-teacher-area pt-120 pb-80">
            <div class="container">
                <div class="row">
                    @foreach ($teachers as $key => $teacher)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="bd-teacher mb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <a href="teacher-details.html">
                                    <div class="bd-teacher-thumb">
                                        <img src="{{ getAssetUrl($teacher->photo, 'uploads/users') }}"
                                            alt="{{ $teacher->name }}">
                                    </div>
                                </a>
                                <div class="bd-teacher-content-wrapper">
                                    <div class="bd-teacher-content">
                                        <h4 class="bd-teacher-title"><a
                                                href="teacher-details.html">{{ $teacher->name }}</a></h4>
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
                    <div class="mt-3">
                        {{$teachers->links('pagination::bootstrap-5')}}
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- teacher area end here  -->
    @endif
</div>
