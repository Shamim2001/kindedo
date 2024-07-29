@extends('backend.layouts.app')
@section('title', 'Add New Program')
@section('page-title', 'Add New Program')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('program.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row gx-5">
            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter type name" class="form-control">
                    @error('name')
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
                    <label class="form-label" for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter type title" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="subtitle">Sub Title</label>
                    <textarea class="form-control" name="subtitle" id="subtitle" rows="4" placeholder="Enter your text"></textarea>
                    @error('subtitle')
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

                <div class="mb-3">
                    <label class="form-label" for="gallery">Gallery</label>
                    <x-filepond id="gallery" name="gallery[]" multiple />

                    @error('gallery')
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
