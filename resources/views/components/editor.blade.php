@props(['name', 'class' ])
<textarea wire:model="{{$name}}" name="{{ $name }}" class="{{ $class ?? '' }}" id="tinyeditorinstance">{!! $slot !!}</textarea>
