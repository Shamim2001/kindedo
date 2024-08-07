<div>
    <x-breadcrumb title="Gallery" />


    <!-- gallery area start here  -->
    <div class="bd-gallery-area p-relative pt-120 pb-95 p-relative">
        <div class="container">
            @foreach ($galleries->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $index => $gallery)
                        <div class="{{ $index == 1 ? 'col-lg-5' : ($index == 3 ? 'col-lg-4' : 'col-lg-3') }}">
                            <div class="bd-gallery mb-25 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="bd-gallery-thumb-wrapper">
                                    <div class="bd-gallery-thumb">
                                        <img src="{{ getAssetUrl($gallery->name, 'uploads/gallery') }}" alt="img not found!">
                                    </div>
                                    <div class="bd-gallery-icon">
                                        <a href="{{ getAssetUrl($gallery->name, 'uploads/gallery') }}" class="popup-image"><i
                                                class="flaticon-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="mt-3">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>

    <!-- gallery area end here  -->
</div>
