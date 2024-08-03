@extends('backend.layouts.app')
@section('title', 'Add New Category')
@section('page-title', 'Add New Category')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('category.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row gx-5">
            <div class="col-8 mx-auto">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter type name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="text-end mt-4">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>

            </div>
        </div>
    </form>

@endsection
