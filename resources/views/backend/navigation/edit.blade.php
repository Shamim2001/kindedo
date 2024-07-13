@extends('backend.layouts.app')

@section('title', 'Edit Navigation')
@section('page-title', 'Edit Navigation')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 bg-white p-3">
            <div class="text-end">
                <a href="{{ route('navigation.index') }}" class="btn text-sm btn-outline-secondary">
                    <i class="ri-add-line align-bottom me-1"></i>Back</a>
            </div>
            <div class="my-3">
                <form action="{{ route('navigation.update', $navigation) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter slide name" value="{{ $navigation->name }}">
                                <label for="name">Name</label>

                                @error('name')
                                    <p><small class="text-danger">{{ $message }}</small></p>
                                @enderror
                            </div>

                        </div>
                        <div class="col-5">
                            <div class="form-floating">
                                <select class="form-select" name="location" id="location"
                                    aria-label="Floating label select example">
                                    <option value="none">Choose...</option>
                                    <option value="main_menu" {{ $navigation->location == 'main_menu' ? 'selected' : '' }}>
                                        Main Menu
                                    </option>
                                    <option value="footer_menu"
                                        {{ $navigation->location == 'footer_menu' ? 'selected' : '' }}>Footer Menu
                                    </option>
                                </select>
                                <label for="location">Location</label>
                                @error('location')
                                    <p><small class="text-danger">{{ $message }}</small></p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-check form-switch form-switch-dark">
                                <h5 class="fs-sm fw-medium text-muted">Status</h5>
                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck7"
                                    name="status" {{ $navigation->status == 'active' ? 'checked="checked"' : '' }}
                                    value="active">
                                <label class="form-check-label" for="SwitchCheck7">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div id="custom_menu">
                                <div class="mb-3">
                                    <h5 class="fs-sm fw-medium text-muted">Menu Items</h5>
                                    <div class="list-group col nested-list nested-sortable-handle" id="menu_item_box">

                                        {{-- Empty Row --}}
                                        <div class="list-group-item nested-1 menu_item" id="row0"
                                            style="display: none">
                                            <i class="ri-drag-move-fill align-bottom handle"></i>
                                            <div class="row g-2">
                                                <div class="col-5 menu_item_box">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control menu_title"
                                                            id="menu-title-0" Title name="menu_title[]"
                                                            value="{{ old('menu-title.1') }}"
                                                            placeholder="Enter menu title">
                                                        <label for="menu-title-0">Title</label>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control menu_url" id="menu-url-0"
                                                            name="menu_url[]" value="{{ old('menu-url.1') }}"
                                                            placeholder="Enter menu url">
                                                        <label for="menu-url-0">Url</label>
                                                    </div>
                                                </div>

                                                <div class="col-1 text-end">
                                                    <div class="remove_action">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- first Row --}}
                                        @foreach (json_decode($navigation->items) as $key => $item)
                                            <div class="list-group-item nested-1 menu_item" id="row{{ ++$key }}">
                                                <i class="ri-drag-move-fill align-bottom handle"></i>
                                                <div class="row g-2">
                                                    <div class="col-5 menu_item_box">
                                                        <div class="form-floating mb-2">
                                                            <input type="text" class="form-control menu_title"
                                                                id="menu-title-{{ $key }}" Title
                                                                name="menu_title[]" value="{{ $item->title }}"
                                                                placeholder="Enter menu title">
                                                            <label for="menu-title-{{ $key }}">Title</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control menu_url"
                                                                id="menu-url-{{ $key }}" name="menu_url[]"
                                                                value="{{ $item->url }}" placeholder="Enter menu url">
                                                            <label for="menu-url-{{ $key }}">Url</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-1 text-end">
                                                        <div class="remove_action">
                                                            <button type="button"
                                                                class="btn btn-outline-danger btn-icon mt-2 row-delete"
                                                                title="Remove" data-row="row{{ $key }}"><i
                                                                    class="ri-delete-bin-5-line"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-info" id="addRow">
                                    <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i>
                                        Add New Item</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr class="border-dark">
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary btn-label"><i
                                class="ri-check-double-line label-icon align-middle fs-lg me-2"></i>
                            Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .remove_action {
            margin-left: -10px;
        }
    </style>
@endpush

@push('js')
    <script>
        function copyRow(container, firstItem, rows) {
            // Copy first Row
            var copy = firstItem.clone();
            // Hide row
            copy.hide();

            var last_row_id = $(rows).last().attr('id');
            var last_row_number = parseInt(last_row_id.match(/^([a-zA-Z]+)(\d+)$/)[2], 10);

            // int new id
            var newID = 'row' + (last_row_number + 1);
            // change id to new row
            copy.attr('id', newID);
            // add Attr
            copy.find('input').attr('required', 'required');

            // insert remove button
            copy.find('.remove_action').append(
                '<button type="button" class="btn btn-outline-danger btn-icon mt-2 row-delete" title="Remove" data-row="' +
                newID + '"><i class="ri-delete-bin-5-line"></i></button>'
            );

            // show new row with animation
            setTimeout(() => {
                copy.slideDown();
            }, 50);

            // append new row to main box
            container.append(copy);
        }


        $(function() {
            // Copy Row
            $("#addRow").on('click', function(e) {
                e.preventDefault();
                var container = $('#menu_item_box');
                var firstItem = $('#row0');
                var rows = $('#menu_item_box > div.menu_item');

                copyRow(container, firstItem, rows);
            });


            // Row item Remove
            $(document).on('click', '.row-delete', function(e) {
                e.preventDefault();
                // get row id
                var row = "#" + $(this).data('row');
                // hide and remove row
                $(row).hide('slow', function() {
                    $(row).remove();
                })
            });
        });
    </script>
@endpush
