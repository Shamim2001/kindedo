@extends('backend.layouts.app')
@section('title', 'Add New Faq')
@section('page-title', 'Add New Faq')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="text-end">
                    <a href="{{ route('faq.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('faq.store') }}" method="POST">
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
                        <label for="content" class="form-label">Content</label>
                        <x-editor name="content" />
                        @error('content')
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
