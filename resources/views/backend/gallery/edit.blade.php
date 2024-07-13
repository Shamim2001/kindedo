@extends('backend.layouts.app')
@section('title', 'Edit Gallery')
@section('page-title', 'Edit Gallery')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="text-end">
                    <a href="{{ route('gallery.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <h6 class="card-title">Gallery</h6>
                        <x-filepond name="gallery[]" id="gallery" multiple="true" file="{{ $gallery->name }}" location="uploads/gallery" />
                    </div>
                    <hr>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
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
