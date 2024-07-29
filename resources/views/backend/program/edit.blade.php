@extends('backend.layouts.app')
@section('title', 'Edit Program')
@section('page-title', 'Edit Program')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('program.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row gx-5">
            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter type name" class="form-control" value="{{ $program->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="excerpt">Excerpt</label>
                    <textarea class="form-control" name="excerpt" id="excerpt" rows="4" placeholder="Enter your text">{{ $program->excerpt }}</textarea>

                    @error('excerpt')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <x-editor name="description">{{ $program->description }}</x-editor>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter type title" class="form-control" value="{{ $program->title }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="subtitle">Sub Title</label>
                    <textarea class="form-control" name="subtitle" id="subtitle" rows="4" placeholder="Enter your text">{{ $program->subtitle }}</textarea>
                    @error('subtitle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <x-filepond id="image" name="image" file="{{ $program->image }}" location="uploads/programs" />

                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="gallery">Gallery</label>

                    <x-filepond id="gallery" name="gallery[]" file="" location="" multiple="true" />

                        <div class="">
                            @foreach ($program->gallery as $item)
                                <img src="{{ getAssetUrl($item->name, 'uploads/gallery') }}" width="80"
                                    alt="{{ $item->name }}">
                            @endforeach
                        </div>
                    @error('gallery')
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
