@extends('backend.layouts.app')
@section('title', 'Edit Faq')
@section('page-title', 'Edit Faq')


@section('content')
    <div class="row">
        <div class="col-8 mx-auto bg-body p-4">
            <div class="text-end">
                <a href="{{ route('slider.index') }}" class="btn btn-dark">Back</a>
            </div>

            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row align-items-center">
                    <div class="col-9">
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter type title"
                                class="form-control" value="{{ $slider->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-switch form-switch-primary">
                            <h5 class="fs-lg fw-medium ">Status</h5>
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck7" name="status"
                                value="active" {{ $slider->status == 'active' ? 'checked="checked"' : '' }}>
                            <label class="form-label" class="form-check-label" for="SwitchCheck7">Active</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="subtitle">Sub Title</label>
                    <input type="text" name="subtitle" id="subtitle" placeholder="Enter type subtitle"
                        class="form-control" value="{{ $slider->subtitle }}">
                    @error('subtitle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="btn_txt">Button Text</label>
                    <input type="text" id="btn_txt" name="btn_text" class="form-control"
                        placeholder="Enter button text" value="{{ $slider->btn_text }}">
                    @error('btn_txt')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <h6 class="card-title">Image</h6>
                    <x-filepond name="image" id="image" location="uploads/sliders"
                                file="{{ $slider->image }}" />
                </div>


                <hr>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@push('js')
    <script>
        $(function() {
            var timeout = null
            $('input#name').on('keyup', function() {
                var text = this.value
                clearTimeout(timeout)
                timeout = setTimeout(function() {
                    var slug = slugify(text);
                    $('input#slug').val(slug);
                }, 300)
            });
        });
    </script>
@endpush
