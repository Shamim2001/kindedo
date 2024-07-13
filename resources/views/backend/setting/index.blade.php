@extends('backend.layouts.app')
@section('title', 'Settings')
@section('page-title', 'Settings')


@section('content')
    <div class="col-10 mx-auto">
        <div class="bg-white p-4">
            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="site_title" class="form-label">Site Title</label>
                    <input type="text" class="form-control" name="site_title" id="site_title"
                        value="{{ $setting->site_title }}">
                </div>
                <div class="mb-3">
                    <label for="site_description" class="form-label">Site Description</label>
                    <textarea name="site_description" id="site_description" class="form-control" rows="5">{{ $setting->site_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="copyright" class="form-label">Copyright</label>
                    <input type="text" class="form-control" name="copyright" id="copyright"
                        value="{{ $setting->copyright }}">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="main_logo" class="form-label">Main Logo</label>
                            <x-filepond id="main_logo" name="main_logo" value="{{ $setting->main_logo }}" ratio="0.5"
                                class="filepond" file="{{ $setting->main_logo }}" location="uploads/setting/" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="footer_logo" class="form-label">Footer Logo</label>
                            <x-filepond id="footer_logo" name="footer_logo" value="{{ $setting->footer_logo }}"
                                ratio="0.5" class="filepond" file="{{ $setting->footer_logo }}"
                                location="uploads/setting/" />
                        </div>
                    </div>
                </div>



                @if (!empty($setting->social_media))
                    <div class="mb-3">
                        <div class="list-group col nested-list nested-sortable-handle" id="social_box">

                            {{-- Empty Row --}}
                            <div class="list-group-item nested-1 social_item" id="row0" style="display: none">
                                <i class="ri-drag-move-fill align-bottom handle"></i>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="social_icon">
                                                <select class="form-select" id="social-icon-select" name="social_icon[]">
                                                    <option value="">No icon</option>
                                                    @foreach (fontAwesomeSocial() as $item)
                                                        <option value="{{ $item }}">{{ $item }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </span>

                                            <div class="form-floating">
                                                <input type="text" class="form-control social_name" id="social-name"
                                                    name="social_name[]" value="" placeholder="Enter title">
                                                <label for="social-name">Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control social_url" id="social-url"
                                                name="social_url[]" value="" placeholder="Enter title">
                                            <label for="social-url">Url</label>
                                        </div>
                                    </div>


                                    <div class="col-md-1">
                                        <div class="remove_action">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach (json_decode($setting->social_media, false) as $key => $social)
                                <div class="list-group-item nested-1 social_item" id="row{{ ++$key }}"><i
                                        class="ri-drag-move-fill align-bottom handle"></i>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text" id="social_icon">
                                                    <select class="form-select icon_select"
                                                        id="social-icon-{{ $key }}"
                                                        aria-label="{{ $social->name }}" name="social_icon[]">
                                                        <option value="">No icon</option>
                                                        @foreach (fontAwesomeSocial() as $item)
                                                            <option value="{{ $item }}"
                                                                {{ $item == $social->icon ? 'selected' : '' }}>
                                                                {{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control social_name"
                                                        id="social-name-{{ $key }}" name="social_name[]"
                                                        value="{{ $social->name }}">
                                                    <label for="social-name-{{ $key }}">Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control social_url"
                                                    id="social-url-{{ $key }}" name="social_url[]"
                                                    value="{{ $social->url }}" placeholder="Enter Url">
                                                <label for="social-url-{{ $key }}">Url</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="remove_action">
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-icon mt-2 row-delete" title="Remove"
                                                    data-row="row{{ $key }}"><i
                                                        class="ri-delete-bin-5-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary" id="addRow"
                        onclick="copyRow('#social_box', '#row0', '#social_box > div.social_item', iconPickerInit, ' select#social-icon-select')">
                        <i class="ri-add-line align-bottom me-1"></i>
                        Add New Social
                    </button>
                @endif


                <hr class="border-dark">
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary btn-label"><i
                            class="ri-check-double-line label-icon align-middle fs-lg me-2"></i>
                        Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        $(function() {

            $(document).on('change', '#social_box .social_item select', function(e) {
                e.preventDefault();
                var val = $(this).val();
                var parts = val.split("-");
                var result = parts.slice(1).join(" ");
                result = result.replace(/\b\w/g, function(match) {
                    return match.toUpperCase();
                })
                // get parent row id
                var row = $(this).closest('.social_item');
                // init row id
                var rowID = "#" + row.attr('id');
                // insert text to social name input
                $(rowID + ' .social_name').val(result);
            });
        });


        // Init iconPicker
        iconPickerInit('.icon_select');

        // icon picker
        function iconPickerInit(selector) {
            jQuery(document).ready(function($) {
                // Icon Picker
                $(selector).fontIconPicker({
                    theme: 'fip-bootstrap', // The CSS theme to use with this fontIconPicker. You can set different themes on multiple elements on the same page
                    source: false, // Icons source (array|false|object)
                    emptyIcon: true, // Empty icon should be shown?
                    emptyIconValue: '', // The value of the empty icon, change if you select has something else, say "none"
                    autoClose: true, // Whether or not to close the FIP automatically when clicked outside
                    iconsPerPage: 30, // Number of icons per page
                    hasSearch: true, // Is search enabled?
                    searchSource: false, // Give a manual search values. If using attributes then for proper search feature we also need to pass icon names under the same order of source
                    appendTo: 'self', // Where to append the selector popup. You can pass string selectors or jQuery objects
                    useAttribute: false, // Whether to use attribute selector for printing icons
                    attributeName: 'data-icon', // HTML Attribute name
                    convertToHex: true, // Whether or not to convert to hexadecimal for attribute value. If true then please pass decimal integer value to the source (or as value="" attribute of the select field)
                    allCategoryText: 'From all categories', // The text for the select all category option
                    unCategorizedText: 'Uncategorized', // The text for the select uncategorized option
                    iconGenerator: null, // Icon Generator function. Passes, item, flipBoxTitle and index
                    windowDebounceDelay: 150, // Debounce delay while fixing position on windowResize
                    searchPlaceholder: 'Search Icons' // Placeholder for the search input
                });
            });
        }
    </script>
@endpush


@push('css')
    <style>
        .icons-selector i{
            font-family: "Font Awesome 5 Brands" !important;
        }
    </style>
@endpush