@extends('backend.layouts.app')
@section('title', 'Promo')
@section('page-title', 'Promo')

@section('content')

    <div class="text-end mb-3">
        <!-- Replace the href with an Alpine.js action to open the modal -->
        <a href="{{ route('promo.create') }}" class="btn btn-dark">Add New</a>
    </div>

    <!-- Table Dark -->
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width:5%" class="text-center">#</th>
                <th scope="col" style="width:10%">Image</th>
                <th scope="col" style="width:30%">Title</th>
                <th scope="col" style="width:25%">Video Url</th>
                <th scope="col" style="width:10%">Status</th>
                <th scope="col" class="text-center" style="width:10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($promos as $key => $promo)
                <tr>
                    <td style="width: 5%" scope="row" class="text-center">
                        {{ $promos->perPage() * ($promos->currentPage() - 1) + ++$key }}
                    </td>
                    <td style="width: 10%">
                        <img src="{{ getAssetUrl($promo->image, 'uploads/promos') }}" alt="{{ $promo->title }}"
                            class="avatar-sm">
                    </td>
                    <td style="width: 30%">{{ $promo->title }}</td>
                    <td style="width: 35%">{{ $promo->video_url }}</td>
                    <td style="width: 10%">
                        <span
                            class="badge fs-sm {{ $promo->status == 'active' ? 'bg-primary' : 'bg-danger' }} w-100 text-capitalize">{{ $promo->status }}</span>

                    </td>

                    <td style="width: 10%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">

                            <a href="{{ route('promo.edit', $promo->id) }}" class="btn btn-outline-primary btn-icon btn-sm cursor-pointer"><i
                                    class="ri-edit-2-line"></i></a>


                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $promo->id }})"
                                class="btn btn-outline-danger btn-icon btn-sm"><i class="ri-delete-bin-line"></i></a>


                            <form id="delete-form-{{ $promo->id }}" action="{{ route('promo.destroy', $promo) }}"
                                method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>


                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No promo(s) found!</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    <div class="mt-3">
        {{ $promos->links('pagination::bootstrap-5') }}
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
