@extends('backend.layouts.app')
@section('title', 'Add New Gallery')
@section('page-title', 'Add New Gallery')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="text-end">
                    <a href="{{ route('gallery.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="mb-4">
                        <h6 class="card-title">Gallery</h6>
                        <x-filepond name="gallery[]" id="gallery" multiple="true" />
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
