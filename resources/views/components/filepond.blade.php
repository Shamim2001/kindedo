@props([
    'name' => 'filepond',
    'class' => '',
    'id' => '',
    'file' => '',
    'location' => '',
    'accept' => 'image/png, image/jpeg, image/gif',
    'style' => 'compact',
    'multiple' => false,
])

<input class="form-control filepond {{ $class }}" type="file" id="{{ $id }}" name="{{ $name }}"
    accept="{{ $accept }}" {{ $multiple ? 'multiple' : '' }}>

@if ($file)
    @php
        $file_size = 1024;
        if (file_exists(public_path($location . $file))) {
            $file_size = \File::size(public_path($location . $file));
        }

    @endphp
    @push('js')
        <script>
            $('#{{ $id }}').filepond({
                storeAsFile: true,
                imagePreviewHeight: 170,
                imageCropAspectRatio: '1:1',
                stylePanelAspectRatio: '0.5',
                imageResizeTargetWidth: 200,
                imageResizeTargetHeight: 200,
                imageResizeMode: 'force',
                stylePanelLayout: '{{ $style }}',
                files: [{
                    // the server file reference
                    source: '{{ auth()->id() + rand(2, 2353) }}',

                    // set type to local to indicate an already uploaded file
                    options: {
                        type: 'local',

                        // optional stub file information
                        file: {
                            name: '{{ $file }}',
                            size: {{ $file_size ?? '' }},
                            type: 'image/png',
                        },

                        // pass poster property
                        metadata: {
                            poster: '{{ $file ? getAssetUrl($file, $location) : '' }}',
                        },
                    },
                }, ],

            });
        </script>
    @endpush
@else
    @push('js')
        <script>
            $('#{{ $id }}').filepond({
                storeAsFile: true,
                imagePreviewHeight: 170,
                imageCropAspectRatio: '1:1',
                imageResizeTargetWidth: 200,
                imageResizeTargetHeight: 200,
                stylePanelLayout: '{{ $style }}'
            });
        </script>
    @endpush
@endif
