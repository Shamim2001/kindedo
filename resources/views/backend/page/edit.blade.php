@extends('backend.layouts.app')
@section('title', 'Edit Page')
@section('page-title', 'Edit Page')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="text-end">
                    <a href="{{ route('page.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('page.update', $page) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" placeholder="Enter page title" id="title"
                            name="title" value="{{ $page->title }}">
                        @error('title')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" placeholder="Enter page slug" id="slug"
                            name="slug" value="{{ $page->slug }}">
                        @error('slug')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <x-editor name="description">
                            {!! $page->description !!}
                        </x-editor>
                        @error('description')
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
