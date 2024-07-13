@extends('backend.layouts.app')
@section('title', 'Blog')
@section('page-title', 'Blog')


@section('content')
    <div class="bg-white p-4">
        <div class="text-end mb-4">
            <a href="{{ route('blog.create') }}" class="btn btn-dark">Add New</a>
        </div>
        <!-- Table Dark -->
        <table class="table table-bordered align-middle table-nowrap">
            <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" style="width: 10%">Thumb</th>
                <th scope="col" style="width: 35%">Title</th>
                <th scope="col" style="width: 35%">Description</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($blogs as $key => $blog)
                <tr>
                    <td style="width: 10%" scope="row" class="text-center">
                        {{ $blogs->perPage() * ($blogs->currentPage() - 1) + ++$key }}
                    </td>
                    <td class="text-center">
                        <img src="{{ $blog->thumbnail ? getAssetUrl($blog->thumbnail, 'uploads/blogs') : '/backend/assets/images/users/avatar-3.jpg' }}"
                             alt="" class="avatar-sm">
                    </td>
                    <td style="width: 10%">{{ \Str::of($blog->title)->limit(30)  }}</td>
                    <td style="width: 35%">{!! \Str::of($blog->description)->limit(100) !!}</td>
                    <td style="width: 10%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">

                            <a data-bs-toggle="tooltip" data-bs-custom-class="info-tooltip" data-bs-placement="top"
                                data-bs-original-title="Edit" href="{{ route('blog.edit', $blog) }}"
                                class="link-info fs-base"><i class="ri-edit-2-line"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $blog->id }})" class="link-danger fs-base"><i
                                    class="ri-delete-bin-line"></i></a>


                            <form id="delete-form-{{ $blog->id }}"
                                  action="{{ route('blog.destroy', $blog) }}" method="POST"
                                  style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No blog(s) found!</td>
                </tr>
            @endforelse


            </tbody>
        </table>

        <div class="mt-3">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
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
