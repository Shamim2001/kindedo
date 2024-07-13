@extends('backend.layouts.app')
@section('title', 'Add New Newsletter')
@section('page-title', 'Add New Newsletter')


@section('content')
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="text-end">
                    <a href="{{ route('newsletter.index') }}" class="btn btn-dark">Back</a>
                </div>

                <form action="{{ route('newsletter.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Enter newsletter title" id="name"
                               name="name" value="{{ old('name') }}">
                        @error('name')
                        <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter newsletter email" id="email"
                               name="email" value="{{ old('email') }}">
                        @error('email')
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
