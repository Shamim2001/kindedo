<div>
    <div class="text-end mb-3">
        <!-- Replace the href with an Alpine.js action to open the modal -->
        <a href="javascript:void" class="btn btn-dark"
            x-on:click="isOpen = true; isEdit = false; $wire.set('isEdit', false)" wire:click="modalOpen">Add New</a>
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
                        <img src="{{ getAssetUrl($promo->image, 'uploads/promos') }}" alt="" class="avatar-sm">
                    </td>
                    <td style="width: 30%">{{ $promo->title }}</td>
                    <td style="width: 35%">{{ $promo->video_url }}</td>
                    <td style="width: 10%">
                        <span
                            class="badge fs-sm {{ $promo->status == 'active' ? 'bg-primary' : 'bg-danger' }} w-100 text-capitalize">{{ $promo->status }}</span>

                    </td>

                    <td style="width: 10%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">

                            <a href="#" class="btn btn-outline-primary btn-icon btn-sm cursor-pointer"
                                x-on:click="isOpen = true; isEdit = true; $wire.set('isEdit', true); $wire.editPromo({{ $promo->id }})"><i
                                    class="ri-edit-2-line"></i></a>


                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                wire:click.prevent="deletePromo({{ $promo->id }})"
                                class="btn btn-outline-danger btn-icon btn-sm"><i class="ri-delete-bin-line"></i></a>


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

    {{-- add new promo popup --}}
    <div x-data="{ isOpen: false, isEdit: false }" class="text-end mb-3">

        <div x-show="isOpen" x-on:open-modal.window="isOpen = true" x-on:close-modal.window="isOpen = false"
            style="display: none;" x-transition.duration.500ms>
            <!-- Modal content -->
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $isEdit ? 'Edit Promo' : 'Add New Promo' }}</h5>
                            <button type="button" class="btn-close" wire:click="modalClose"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Your form goes here -->
                            <form class="text-start" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="title">Title</label>
                                                <input type="text" wire:model="title" id="title"
                                                    class="form-control">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="excerpt">Excerpt</label>
                                                <textarea class="form-control" wire:model="excerpt" id="excerpt" rows="4" placeholder="Enter your text"></textarea>
                                                @error('excerpt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" wire:model="description" id="description" rows="7"
                                                    placeholder="Enter your message"></textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <div class="form-check form-switch form-switch-primary">
                                                    <h5 class="fs-lg fw-medium ">Status</h5>
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck7" wire:model="status" value="active">
                                                    <label class="form-check-label" for="SwitchCheck7">Active</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="video_url">Video Url</label>
                                                <input type="url" wire:model="video_url" id="video_url"
                                                    class="form-control">
                                                @error('video_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 border border-success-subtle p-2 rounded-bottom rounded-3 border-2">
                                                <label for="image">Image</label>
                                                <input type="file" wire:model="image" id="image"
                                                    class="form-control">

                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                @if ($image)
                                                    <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"
                                                        class="img-thumbnail mt-2" style="max-width: 200px;">
                                                @endif

                                                @if ($previewImage && empty($image))
                                                    <img src="{{ getAssetUrl($previewImage, 'uploads/promos') }}"
                                                        alt="Uploaded Image" class="img-thumbnail mt-2"
                                                        style="max-width: 200px;">
                                                @endif
                                            </div>
                                            <div class="text-center mt-5 w-100">
                                                <button class="btn btn-primary" wire:click.prevent="submit"
                                                    type="button">{{ $isEdit ? 'Update' : 'Create' }}</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-backdrop fade show"></div>
        </div>
    </div>


    <style>
        .modal {
            --tb-modal-width: 75%;
        }
    </style>

    <script>
        // Confirmed Listener
        window.addEventListener('alert:confirm', function(event) {
            let data = event.detail;
            Swal.fire({
                icon: data.type,
                title: data.message,
                showDenyButton: data.showDenylButton ?? false,
                showCancelButton: data.showCancelButton ?? false,
                confirmButtonText: data.confirmButtonText,
                denyButtonText: data.denyButtonText ?? ''
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deleteConfirmed', data.id);
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        });


        // Success Listener
        window.addEventListener('success', function(event) {
            let message = event.detail;

            Toastify({
                text: message,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "bottom",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        });
    </script>
</div>
