@extends('backend.layouts.app')
@section('title', 'Contact')
@section('page-title', 'Contact')

@section('content')

    <!-- Table Dark -->
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width:5%" class="text-center">#</th>
                <th scope="col" style="width:30%">Name</th>
                <th scope="col" style="width:30%">Email</th>
                <th scope="col" style="width:20%">Phone</th>
                <th scope="col" class="text-center" style="width:15%">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $key => $contact)
                <tr>
                    <td style="width: 5%" scope="row" class="text-center">
                        {{ $contacts->perPage() * ($contacts->currentPage() - 1) + ++$key }}
                    </td>
                    <td style="width: 30%">{{ $contact->name }}</td>
                    <td style="width: 30%">{{ $contact->email }}</td>
                    <td style="width: 20%">{{ $contact->phone }}</td>

                    <td style="width: 15%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">

                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-outline-primary btn-icon btn-sm cursor-pointer"><i
                                    class="ri-eye-2-line"></i></a>


                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $contact->id }})"
                                class="btn btn-outline-danger btn-icon btn-sm"><i class="ri-delete-bin-line"></i></a>


                            <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy', $contact) }}"
                                method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>


                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No contact(s) found!</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    <div class="mt-3">
        {{ $contacts->links('pagination::bootstrap-5') }}
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
