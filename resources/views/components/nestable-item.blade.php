@props(['title'=>'Item Title', 'level'=> '1'])

<div class="list-group-item nested-{{ $level }}"><i class="ri-drag-move-fill align-bottom handle"></i>{{ $title }} {!! $slot !!}</div>
