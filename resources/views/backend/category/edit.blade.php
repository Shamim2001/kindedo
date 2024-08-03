@extends('backend.layouts.app')
@section('title', 'Edit Category')
@section('page-title', 'Edit Category')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('category.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row gx-5">
            <div class="col-8 mx-auto">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter type name" class="form-control" value="{{ $category->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="text-end mt-4">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>

            </div>
        </div>
    </form>

@endsection
