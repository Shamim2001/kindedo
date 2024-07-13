@extends('backend.layouts.app')
@section('title', 'Pages')
@section('page-title', 'Pages')


@section('content')
    <div class="bg-white p-4">
        <div class="text-end mb-4">
            <a href="{{ route('page.create') }}" class="btn btn-dark">Add New</a>
        </div>
        <!-- Table Dark -->
        <table class="table table-bordered align-middle table-wrap">
            <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" style="width: 25%">Name</th>
                <th scope="col" style="width: 25%">slug</th>
                <th scope="col" style="width: 30%">Description</th>
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
                        <a href="{{ route('page.edit', $page) }}" data-bs-toggle="tooltip"
                            data-bs-custom-class="primary-tooltip" data-bs-placement="top" data-bs-original-title="Edit"
                            class="link-info">{{ $page->title }}</a>
                    </td>
                    <td style="width: 10%">{{ $page->slug }}</td>
                    <td style="width: 30%">{!! \Str::of($page->description)->limit(70) !!}</td>
                    <td style="width: 15%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">
                            <a data-bs-toggle="tooltip" data-bs-custom-class="info-tooltip" data-bs-placement="top"
                                data-bs-original-title="Show" href="{{ route('page.show', $page) }}"
                                class="link-primary fs-base"><i class="ri-eye-2-line"></i></a>

                            <a data-bs-toggle="tooltip" data-bs-custom-class="info-tooltip" data-bs-placement="top"
                                data-bs-original-title="Edit" href="{{ route('page.edit', $page) }}"
                                class="link-info fs-base"><i class="ri-edit-2-line"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $page->id }})" class="link-danger fs-base"><i
                                    class="ri-delete-bin-line"></i></a>


                            <form id="delete-form-{{ $page->id }}"
                                  action="{{ route('page.destroy', $page) }}" method="POST"
                                  style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Page(s) found!</td>
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
