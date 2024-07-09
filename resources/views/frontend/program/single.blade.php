@extends('frontend.layouts.master')
@section('title', 'Kindedo - Program Single')

@section('content')

    @livewire('pages.program-details', ['program' => $program])
@endsection
