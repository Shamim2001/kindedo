@props(['id'=> ''])

<div class="list-group col nested-list nested-sortable-handle" id="{{ $id }}">
    {!! $slot !!}
</div>
