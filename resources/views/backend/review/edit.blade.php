@extends('backend.layouts.app')
@section('title', 'Edit Review')
@section('page-title', 'Edit Review')


@section('content')
    <div class="bg-white p-3">
        <div class="row">
            <div class="col-7 mx-auto">
                <div class="text-end">
                    <a href="{{ route('review.index') }}" class="btn btn-dark">Back</a>
                </div>
                <hr>
                <form action="{{ route('review.update', $review) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control">{{ $review->content }}</textarea>
                        @error('content')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-select" name="product_id" id="product_id">
                            <option value="none">Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ $review->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" step="0.1" class="form-control" id="rating" name="rating"
                            value="{{ $review->rating }}">
                        @error('rating')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
        $(function() {
            var timeout = null
            $('input#title').on('keyup', function() {
                var text = this.value
                clearTimeout(timeout)
                timeout = setTimeout(function() {
                    var slug = slugify(text);
                    $('input#slug').val(slug);
                    $('input#seo_title').val(text);
                }, 300)
            });
        });
    </script>
@endpush
