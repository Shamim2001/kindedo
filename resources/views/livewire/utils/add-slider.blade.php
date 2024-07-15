<div x-data="{ isOpen: false }" class="text-end mb-3">
    <a href="#" class="btn btn-dark" @click="isOpen = true">Add New</a>

    <div x-show="isOpen" x-cloak>
        <!-- Modal content -->
        <div class="modal" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Slider</h5>
                        <button type="button" class="btn-close" @click="isOpen = false"></button>
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
                                    <input type="text" wire:model="subtitle" id="subtitle" class="form-control">
                                    @error('subtitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input wire:model="image" type="file" class="form-control" id="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"
                                            class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                </div> --}}

                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" wire:model="image" id="image" class="form-control-file">

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

@push('css')
    <style>
        .modal {
            --tb-modal-width: 50%;
        }
    </style>
@endpush
