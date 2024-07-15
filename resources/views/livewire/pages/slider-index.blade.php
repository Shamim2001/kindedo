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
                <th scope="col" style="width:25%">Subtitle</th>
                <th scope="col" style="width:10%">Status</th>
                <th scope="col" class="text-center" style="width:10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sliders as $key => $slider)
                <tr>
                    <td style="width: 5%" scope="row" class="text-center">
                        {{ $sliders->perPage() * ($sliders->currentPage() - 1) + ++$key }}
                    </td>
                    <td style="width: 10%">
                        <img src="{{ getAssetUrl($slider->image, 'uploads/sliders') }}" alt=""
                            class="avatar-sm">
                    </td>
                    <td style="width: 30%">{{ $slider->title }}</td>
                    <td style="width: 35%">{{ $slider->subtitle }}</td>
                    <td style="width: 10%">
                        <span
                            class="badge fs-sm {{ $slider->status == 'active' ? 'bg-primary' : 'bg-danger' }} w-100 text-capitalize">{{ $slider->status }}</span>

                    </td>

                    <td style="width: 10%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">

                            <a href="#" class="btn btn-outline-primary btn-icon btn-sm cursor-pointer"
                                x-on:click="isOpen = true; isEdit = true; $wire.set('isEdit', true); $wire.editSlider({{ $slider->id }})"><i
                                    class="ri-edit-2-line"></i></a>


                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                wire:click.prevent="deleteSlider({{ $slider->id }})"
                                class="btn btn-outline-danger btn-icon btn-sm"><i class="ri-delete-bin-line"></i></a>


                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No slider(s) found!</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    <div class="mt-3">
        {{ $sliders->links('pagination::bootstrap-5') }}
    </div>

    {{-- add new slider popup --}}
    <div x-data="{ isOpen: false, isEdit: false }" class="text-end mb-3">

        <div x-show="isOpen" x-on:open-modal.window="isOpen = true" x-on:close-modal.window="isOpen = false"
            style="display: none;" x-transition.duration.500ms>
            <!-- Modal content -->
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" x-text="isEdit ? 'Edit Slider' : 'Add New Slider' "></h5>
                            <button type="button" class="btn-close" wire:click="modalClose"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Your form goes here -->
                            <form class="text-start" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="title">Title</label>
                                                <input type="text" wire:model="title" id="title"
                                                    class="form-control">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch form-switch-primary">
                                                <h5 class="fs-lg fw-medium ">Status</h5>
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="SwitchCheck7" wire:model="status" value="active">
                                                <label class="form-check-label" for="SwitchCheck7">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subtitle">Sub Title</label>
                                        <input type="text" wire:model="subtitle" id="subtitle" class="form-control">
                                        @error('subtitle')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" wire:model="image" id="image"
                                            class="form-control-file">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"
                                                class="img-thumbnail mt-2" style="max-width: 200px;">
                                        @endif

                                        @if ($previewImage && empty($image))
                                            <img src="{{ getAssetUrl($previewImage, 'uploads/sliders') }}"
                                                alt="Uploaded Image" class="img-thumbnail mt-2"
                                                style="max-width: 200px;">
                                        @endif
                                    </div>
                                    <div class="text-center mt-5">
                                        <button class="btn btn-primary w-25" wire:click.prevent="submit"
                                            type="button" x-text="isEdit ? 'Update' : 'Create' "></button>
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
            --tb-modal-width: 50%;
        }

        #image {
            border: 2px solid var(--tb-green);
            padding: 6px 10px;
            width: 100%;
            border-radius: 5px;
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
                    @this.call('deleteConfirmed', data.slider);
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
