@extends('backend.layouts.app')
@section('title', 'Customers')

@push('css')
    <!-- DataTables -->
    <link href="/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!-- Bordered Tables -->
    <table class="table table-bordered table-nowrap">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col" class="text-center">Order</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)
                <tr>
                    <td scope="row" class="text-center">
                        {{ $customers->perPage() * ($customers->currentPage() - 1) + ++$key }}
                    </td>

                    <td class="avatar-md text-center">
                        @if ($customer->photo)
                            <div style="background-image:url({{ getAssetUrl($customer->photo, 'uploads/customer') }});background-size:cover;background-position:center"
                                class="rounded-circle avatar-sm shadow"></div>
                        @else
                            <div class="avatar-xs shadow">
                                <div class="avatar-title rounded bg-soft-secondary text-secondary text-uppercase">
                                    {{ $customer->name[0] }}
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="">{{ $customer->name }}</a>
                    </td>
                    <td class="align-middle">{{ $customer->email }}</td>
                    <td class="text-center"><span class="badge bg-primary">{{ count($customer->orders) }}</span></td>
                    <td class="align-middle">
                        <div class="hstack justify-content-center flex-wrap gap-3">

                            <a href="" class="link-success fs-15"><i class="ri-eye-fill"></i></a>

                            <a href="javascript:void(0)" class="link-danger fs-15"
                                onclick="deleteRecord({{ $customer->id }})"><i class="ri-delete-bin-line"></i></a>
                            <form id="delete-form-{{ $customer->id }}"
                                action="{{ route('customer.destroy', lock($customer->id)) }}" method="POST"
                                style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $customers->links('pagination::bootstrap-5') }}
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
