@extends('backend.layouts.app')
@section('title', 'Add New Course')
@section('page-title', 'Add New Course')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('course.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label class="form-label" for="teacher">Teacher</label>
                    <select name="teacher" class="form-control teacher_id" id="teacher">
                        <option value="none">Enter select teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>

                    @error('teacher')
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
                    <label class="form-label" for="start_time">Start Date</label>
                    <input type="time" name="start_time" id="start_time" placeholder="Enter type start date"
                        class="form-control" value="08:00">
                    @error('start_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="end_time">End Date</label>
                    <input type="time" name="end_time" id="end_time" placeholder="Enter type end date"
                        class="form-control" value="12:00">
                    @error('end_time')
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
                    <label class="form-label" for="pdf">Pdf Upload</label>
                    <x-filepond id="pdf" name="pdf" accept="application/pdf" />

                    @error('pdf')
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
            $('.teacher_id').select2();
        });
    </script>
@endpush
