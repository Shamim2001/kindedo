@extends('backend.layouts.app')
@section('title', 'Pages')
@section('page-title', 'Pages')


@section('content')
    <div class="">
        <div class="text-end mb-4">
            <a href="{{ route('page.create') }}" class="btn btn-dark">Add New</a>
        </div>
        <!-- Table Dark -->
        <table class="table table-bordered align-middle table-wrap">
            <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" style="width:10%">Image</th>
                <th scope="col" style="width:30%">Title</th>
                <th scope="col" style="width:25%">Category</th>
                <th scope="col" style="width:10%">Status</th>
                <th scope="col" class="text-center" style="width: 15%">Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($pages as $key => $page)
                <tr>
                    <td style="width: 5%" scope="row" class="text-center">
                        {{ $pages->perPage() * ($pages->currentPage() - 1) + ++$key }}
                    </td>
                    <td style="width: 10%">
                        <img src="{{ getAssetUrl($page->image, 'uploads/pages') }}" alt="{{ $page->title }}"
                            class="avatar-sm">
                    </td>
                    <td style="width: 35%">{{ $page->title }}</td>
                    <td style="width: 3%">{{ $page->category->name }}</td>
                    <td style="width: 10%">
                        <span
                            class="badge fs-sm {{ $page->status == 'active' ? 'bg-primary' : 'bg-danger' }} w-100 text-capitalize">{{ $page->status }}</span>

                    </td>

                    <td style="width: 10%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">

                            <a href="{{ route('page.edit', $page->id) }}" class="btn btn-outline-primary btn-icon btn-sm cursor-pointer"><i
                                    class="ri-edit-2-line"></i></a>


                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $page->id }})"
                                class="btn btn-outline-danger btn-icon btn-sm"><i class="ri-delete-bin-line"></i></a>


                            <form id="delete-form-{{ $page->id }}" action="{{ route('page.destroy', $page) }}"
                                method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>


                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No page(s) found!</td>
                </tr>
            @endforelse


            </tbody>
        </table>

        <div class="mt-3">
            {{ $pages->links('pagination::bootstrap-5') }}
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
