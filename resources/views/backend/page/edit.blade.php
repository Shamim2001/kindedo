@extends('backend.layouts.app')
@section('title', 'Edit Page')
@section('page-title', 'Edit Page')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('page.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row gx-5">
            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter type title" class="form-control"
                        value="{{ $page->title }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <x-editor name="description">{{ $page->description }}</x-editor>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <div class="form-check form-switch form-switch-primary">
                        <h5 class="fs-lg fw-medium ">Status</h5>
                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck7" name="status"
                            value="active" {{ $page->status == 'active' ? 'checked="checked"' : '' }}>
                        <label class="form-check-label" for="SwitchCheck7">Active</label>
                    </div>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="category">Category</label>
                    <select name="category" class="form-control category_id" id="category">
                        <option value="none">Enter select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $page->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="video_url">Video Url</label>
                    <input type="url" name="video_url" id="video_url" placeholder="Enter type video url"
                        class="form-control" value="{{ $page->video_url }}">
                    @error('video_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <x-filepond id="image" name="image" file="{{ $page->image }}" location="uploads/pages" />

                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <hr>
                <div class="text-center mt-4">
                    <button class="btn btn-primary w-100" type="submit">Update</button>
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
