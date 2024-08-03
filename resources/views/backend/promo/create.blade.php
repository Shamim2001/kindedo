@extends('backend.layouts.app')
@section('title', 'Add New Promo')
@section('page-title', 'Add New Promo')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('promo.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('promo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row gx-5">
            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter type title" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="excerpt">Excerpt</label>
                    <textarea class="form-control" name="excerpt" id="excerpt" rows="4" placeholder="Enter your text"></textarea>
                    @error('excerpt')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <x-editor name="description" />
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <div class="form-check form-switch form-switch-primary">
                        <h5 class="fs-lg fw-medium ">Status</h5>
                        <input class="form-check-input" type="checkbox" checked role="switch" id="SwitchCheck7"
                            name="status" value="active">
                        <label class="form-check-label" class="form-label" for="SwitchCheck7">Active</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="category_id">Category</label>
                    <select name="category_id" class="form-control category_id" id="category_id">
                        <option value="none">Enter select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="video_url">Video Url</label>
                    <input type="url" name="video_url" id="video_url" placeholder="Enter type video url"
                        class="form-control">
                    @error('video_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <x-filepond id="image" name="image" />

                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <hr>
                <div class="text-center mt-4">
                    <button class="btn btn-primary w-100" type="submit">Create</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.category_id').select2();
        });
    </script>
@endpush
