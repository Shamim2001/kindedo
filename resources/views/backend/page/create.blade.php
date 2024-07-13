@extends('backend.layouts.app')
@section('title', 'Add New Page')
@section('page-title', 'Add New Page')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="text-end">
                    <a href="{{ route('page.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('page.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" placeholder="Page title" id="title" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" placeholder="Page slug" id="slug" name="slug"
                            value="{{ old('slug') }}">
                        @error('slug')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <x-editor name="description" />
                        @error('description')
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
