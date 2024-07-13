@extends('backend.layouts.app')

@section('title', 'Navigation')
@section('page-title', 'Navigation')

@section('content')
    <div class="text-end mb-4">
        <a href="{{ route('navigation.create') }}" class="btn btn-dark">Add New</a>
    </div>
    <!-- Table Dark -->
    <table class="table table-bordered align-middle  bg-white">
        <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">Id</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Location</th>
                <th scope="col" class="text-center">Items</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($navigations as $key=>$navigation)
                <tr>
                    <td class="text-center">
                        {{ $navigations->perPage() * ($navigations->currentPage() - 1) + ++$key }}
                    </td>
                    <td class="text-center">{{ $navigation->name }}</td>
                    <td class="text-center">{{ $navigation->location }}</td>
                    <td class="w-50">
                        @foreach (json_decode($navigation->items) as $item)
                            <span class="badge bg-body-info border border-info text-info">{{ $item->title }}</span>
                        @endforeach
                    </td>
                    <td class="text-start">
                        <span
                            class="badge bg-primary-subtle {{ $navigation->status == 'active' ? 'text-primary' : 'text-danger' }} badge-border">{{ $navigation->status }}</span>
                    </td>
                    <td class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">
                            <a data-bs-toggle="tooltip" data-bs-custom-class="info-tooltip" data-bs-placement="top"
                                data-bs-original-title="Edit" href="{{ route('navigation.edit', $navigation) }}"
                                class="link-info fs-base"><i class="ri-edit-2-line"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $navigation->id }})" class="link-danger fs-base"><i
                                    class="ri-delete-bin-line"></i></a>
                            <form id="delete-form-{{ $navigation->id }}"
                                action="{{ route('navigation.destroy', $navigation) }}" method="POST"
                                style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-danger">No Navigation(s) founds!</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    <div class="mt-3">
        {{ $navigations->links('pagination::bootstrap-5') }}
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        function deleteRecord(id) {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you want to delete?</p></div></div>',
                showCancelButton: !0,
                customClass: {
                    confirmButton: "btn btn-primary w-xs me-2 mb-1",
                    cancelButton: "btn btn-danger w-xs mb-1",
                },
                confirmButtonText: "Yes, Delete It!",
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
