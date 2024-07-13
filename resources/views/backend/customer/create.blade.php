@extends('backend.layouts.app')
@section('title', 'Add New Blog')
@section('page-title', 'Add New Blog')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="text-end">
                    <a href="{{ route('blog.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" placeholder="Enter faq title" id="title"
                               name="title" value="{{ old('title') }}">
                        @error('title')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" placeholder="Enter slug title" id="slug"
                               name="slug" value="{{ old('slug') }}">
                        @error('slug')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6 class="card-title">Thumbnail</h6>
                        <x-filepond name="thumbnail" id="thumbnail" />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <x-editor name="description" />
                        @error('description')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="read" class="form-label">Read</label>
                        <input type="text" class="form-control" placeholder="Enter read title" id="read"
                               name="read" value="{{ old('read') }}">
                        @error('read')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <hr>
                    <h6 class="text-muted">Blog Meta</h6>
                    <hr>
                    <div class="mb-3">
                        <label for="seo_title" class="form-label">Meta Title <small>(optional)</small></label>
                        <input type="text" class="form-control" placeholder="Enter seo title" id="seo_title"
                               name="seo_title" value="{{ old('seo_title') }}">
                        @error('seo_title')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="seo_description" class="form-label">Meta Content <small>(optional)</small></label>
                        <textarea name="seo_description" id="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                        @error('seo_description')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <hr>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
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
            $('input#title').on('keyup', function() {
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
