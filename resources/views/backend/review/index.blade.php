@extends('backend.layouts.app')
@section('title', 'Reviews')
@section('page-title', 'Reviews')


@section('content')
    {{-- <div class="text-end mb-4">
        <a href="{{ route('review.create') }}" class="btn btn-dark">Add New</a>
    </div> --}}
    <!-- Table Dark -->
    <table class="table table-bordered align-middle table-nowrap bg-white">
        <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" style="width: 25%">Product Name</th>
                <th scope="col" style="">Customer Name</th>
                <th scope="col" style="">Review</th>
                <th scope="col" style="">rating</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $key => $review)
                <tr>
                    <td scope="row" class="text-center">
                        {{ $reviews->perPage() * ($reviews->currentPage() - 1) + ++$key }}
                    </td>

                    <td style="width: 25%">
                        <a href="{{ route('review.edit', $review) }}" data-bs-toggle="tooltip"
                            data-bs-custom-class="primary-tooltip" data-bs-placement="top" data-bs-original-title="Edit"
                            class="link-info">{{ Str::of($review->product?->title)->limit(50) }}</a>
                    </td>
                    <td style="">{{ $review->customer?->name }}</td>
                    <td style="">{{ Str::of($review->content)->limit(70) }}</td>
                    <td style="" class="text-capitalize">{{ number_format($review->rating) }}</td>
                    <td class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">
                           
                            <a data-bs-toggle="tooltip" data-bs-custom-class="info-tooltip" data-bs-placement="top"
                                data-bs-original-title="Edit" href="{{ route('review.edit', $review) }}"
                                class="link-info fs-base"><i class="ri-edit-2-line"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $review->id }})" class="link-danger fs-base"><i
                                    class="ri-delete-bin-line"></i></a>
                            <form id="delete-form-{{ $review->id }}" action="{{ route('review.destroy', $review) }}"
                                method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No review(s) found!</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    <div class="mt-3">
        {{ $reviews->links('pagination::bootstrap-5') }}
    </div>

@endsection

@push('js')
    <script>
        function deleteRecord(id) {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Do you want to delete?</p></div></div>',
                showCancelButton: !0,
                customClass: {
                    confirmButton: 'btn btn-primary w-xs me-2 mb-1',
                    cancelButton: 'btn btn-danger w-xs mb-1'
                },
                confirmButtonText: "Yes, Delete It!",
                cancelButtonClass: "btn btn-danger w-xs mb-1",
                buttonsStyling: !1,
                showCloseButton: false,
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
