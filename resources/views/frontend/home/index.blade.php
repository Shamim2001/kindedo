@extends('frontend.layouts.master')
@section('title', 'Kindedo - Home')

@section('content')
    @livewire('section.hero-area')


    {{-- @livewire('section.class-area') --}}

    @livewire('section.promo-area')

    @livewire('section.program-area')

    @livewire('section.faq-area')

    @livewire('section.teacher-area')


    {{-- @livewire('section.join-area') --}}



    @livewire('section.gallery-area')
@endsection
