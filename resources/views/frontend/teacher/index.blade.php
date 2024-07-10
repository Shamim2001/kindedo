@extends('frontend.layouts.master')
@section('title', 'Kindedo - Teachers')

@section('content')
    @livewire('pages.teachers', ['teachers' => $teachers])
@endsection
