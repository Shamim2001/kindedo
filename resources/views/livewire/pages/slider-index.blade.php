<div>
    <div class="text-end mb-3">
        <!-- Replace the href with an Alpine.js action to open the modal -->
        <a href="#" class="btn btn-dark" wire:click="modalOpen">Add New</a>
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
                            class="badge fs-sm {{ $slider->status == 'active' ? 'bg-primary' : 'bg-danger' }} w-100">{{ $slider->status }}</span>

                    </td>

                    <td style="width: 10%" class="text-center">
                        <div class="hstack gap-3 flex-wrap justify-content-center">

                            <a wire:click="editSlider({{ $slider->id }})" data-bs-toggle="tooltip"
                                data-bs-custom-class="info-tooltip" data-bs-placement="top"
                                data-bs-original-title="Edit" class="link-info fs-base"><i
                                    class="ri-edit-2-line"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-custom-class="danger-tooltip" data-bs-placement="top"
                                data-bs-original-title="Delete" href="javascript:void(0);"
                                onclick="deleteRecord({{ $slider->id }})" class="link-danger fs-base"><i
                                    class="ri-delete-bin-line"></i></a>


                            <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy', $slider) }}"
                                method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No slider(s) found!</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    <div class="mt-3">
        {{ $sliders->links('pagination::bootstrap-5') }}
    </div>

    {{-- add new slider popup --}}
    <div x-data="{ isOpen: false }" class="text-end mb-3">
        {{-- <a href="#" class="btn btn-dark" @click="isOpen = true">Add New</a> --}}

        <div x-show="isOpen" x-on:open-modal.window="isOpen = true" x-on:close-modal.window="isOpen = false"
            style="display: none;">
            <!-- Modal content -->
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Slider</h5>
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
                                                <h5 class="fs-md fw-medium ">Status</h5>
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="SwitchCheck7" wire:model="status" value="active">
                                                <label class="form-check-label" for="SwitchCheck7">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subtitle">Sub Title</label>
                                        <input type="text" wire:model="subtitle" id="subtitle"
                                            class="form-control">
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
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary" wire:click.prevent="save"
                                            type="button">Create</button>
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


    {{-- edit slider popup --}}
    <div x-data="{ editmodal: false }" class="text-end mb-3">
        {{-- <a href="#" class="btn btn-dark" @click="editmodal = true">Add New</a> --}}

        <div x-show="editmodal" x-on:open-edit-modal.window="editmodal = true"
            x-on:close-edit-modal.window="editmodal = false" style="display: none;">
            <!-- Modal content -->
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Slider</h5>
                            <button type="button" class="btn-close" wire:click="closeEditModal"></button>
                        </div>
                        <div class="modal-body">
                            @if ($currentSlider)

                                <!-- Your form goes here -->
                                <form class="text-start">
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
                                                    <h5 class="fs-md fw-medium ">Status</h5>
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck7" wire:model="status">
                                                    <label class="form-check-label" for="SwitchCheck7">Active</label>
                                                </div>
                                                {{ var_export($status) }}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subtitle">Sub Title</label>
                                            <input type="text" wire:model="subtitle" id="subtitle"
                                                class="form-control">
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
                                        <div class="mt-3">
                                            <button class="btn btn-primary" wire:click.prevent="update"
                                                type="button">Update</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
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
    </style>
</div>

{{-- @push('css')
    <style>
        .modal {
            --tb-modal-width: 50%;
        }
    </style>
@endpush --}}
