@extends('backend.layouts.app')
@section('title', 'Pages')
@section('page-title', 'Pages')


@section('content')
    {{ $page }}
    {!! $page->description !!}
@endsection
