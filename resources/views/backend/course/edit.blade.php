@extends('backend.layouts.app')
@section('title', 'Edit Course')
@section('page-title', 'Edit Course')


@section('content')

    <div class="text-end mb-2">
        <a href="{{ route('course.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row gx-5">
            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter type name" class="form-control" value="{{ $course->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="teacher">Teacher</label>
                    <select name="teacher" class="form-control teacher_id" id="teacher">
                        <option value="none">Enter select teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                        @endforeach
                    </select>

                    @error('teacher')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <x-editor name="description">{{ $course->description }}</x-editor>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">

                <div class="mb-3">
                    <label class="form-label" for="start_time">Start Date</label>
                    <input type="time" name="start_time" id="start_time" placeholder="Enter type start date"
                        class="form-control" value="{{ $course->start_time }}">
                    @error('start_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="end_time">End Date</label>
                    <input type="time" name="end_time" id="end_time" placeholder="Enter type end date"
                        class="form-control" value="{{ $course->end_time }}">
                    @error('end_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <x-filepond id="image" name="image" file="{{ $course->image }}" location="uploads/courses" />

                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pdf">Pdf Upload</label>
                    <x-filepond id="pdf" name="pdf" accept="application/pdf" file="{{ $course->pdf }}" location="uploads/courses" />

                    @error('pdf')
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
            $('.teacher_id').select2();
        });
    </script>
@endpush
