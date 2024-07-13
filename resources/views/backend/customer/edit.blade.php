@extends('backend.layouts.app')
@section('title', 'Edit Blog')
@section('page-title', 'Edit Blog')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="text-end">
                    <a href="{{ route('blog.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" placeholder="Enter faq title" id="title"
                               name="title" value="{{ $blog->title }}">
                        @error('title')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" placeholder="Enter slug title" id="slug"
                               name="slug" value="{{ $blog->slug ?? '' }}">
                        @error('slug')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6 class="card-title">Thumbnail</h6>
                        <x-filepond name="thumbnail" id="thumbnail" file="{{ $blog->thumbnail }}" location="uploads/blogs" />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <x-editor name="description">{!! $blog->description !!}</x-editor>
                        @error('description')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="read" class="form-label">Read</label>
                        <input type="text" class="form-control" placeholder="Enter read title" id="read"
                               name="read" value="{{ $blog->read }}">
                        @error('read')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <hr>
                    <h6 class="text-muted">Product Meta</h6>
                    <hr>
                    <div class="mb-3">
                        <label for="seo_title" class="form-label">Meta Title <small>(optional)</small></label>
                        <input type="text" class="form-control" placeholder="Enter seo title" id="seo_title"
                               name="seo_title" value="{{ $blog->seo_title }}">
                        @error('seo_title')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="seo_description" class="form-label">Meta Content <small>(optional)</small></label>
                        <textarea name="seo_description" id="seo_description" class="form-control">{{ $blog->seo_description }}</textarea>
                        @error('seo_description')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
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
