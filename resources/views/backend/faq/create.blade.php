@extends('backend.layouts.app')
@section('title', 'Add New Faq')
@section('page-title', 'Add New Faq')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('faq.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label class="form-label" for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter type title" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="content">Content</label>
                    <x-editor name="content" />
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <div class="form-check form-switch form-switch-primary">
                        <h5 class="fs-lg fw-medium ">Status</h5>
                        <input class="form-check-input" type="checkbox" checked role="switch" id="SwitchCheck7" name="status"
                            value="active">
                        <label class="form-check-label" class="form-label" for="SwitchCheck7">Active</label>
                    </div>
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
