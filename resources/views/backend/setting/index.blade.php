@extends('backend.layouts.app')
@section('title', 'Settings')
@section('page-title', 'Settings')


@section('content')
    <div class="text-end mb-2">
        <a href="{{ route('setting.index') }}" class="btn btn-dark">Back</a>
    </div>


    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="site_title" class="form-label">Site Title</label>
                    <input type="text" class="form-control" name="site_title" id="site_title"
                        value="{{ $setting->site_title }}">
                </div>
                <div class="mb-3">
                    <label for="site_description" class="form-label">Site Description</label>
                    <textarea name="site_description" id="site_description" class="form-control" rows="5">{{ $setting->site_description }}</textarea>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="since" class="form-label">Since</label>
                            <input type="text" class="form-control" name="since" id="since"
                                value="{{ $setting->since }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ $setting->address }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="support" class="form-label">Support</label>
                            <input type="text" class="form-control" name="support" id="support"
                                value="{{ $setting->support }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{ $setting->phone }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="copyright" class="form-label">Copyright</label>
                    <input type="text" class="form-control" name="copyright" id="copyright"
                        value="{{ $setting->copyright }}">
                </div>
            </div>
            <div class="col-4">

                <div class="mb-3">
                    <label for="favicon" class="form-label">Favicon</label>
                    <x-filepond id="favicon" name="favicon" value="{{ $setting->favicon }}"
                        class="filepond" file="{{ $setting->favicon }}" location="uploads/setting" />
                </div>

                <div class="mb-3">
                    <label for="main_logo" class="form-label">Main Logo</label>
                    <x-filepond id="main_logo" name="main_logo" value="{{ $setting->main_logo }}"
                        class="filepond" file="{{ $setting->main_logo }}" location="uploads/setting" />
                </div>
                <div class="mb-3">
                    <label for="footer_logo" class="form-label">Footer Logo</label>
                    <x-filepond id="footer_logo" name="footer_logo" value="{{ $setting->footer_logo }}" ratio="0.5"
                        class="filepond" file="{{ $setting->footer_logo }}" location="uploads/setting" />
                </div>

                <hr class="border-dark">
                <div class="mb-3 ">
                    <button type="submit" class="btn btn-primary w-100">
                        Update</button>
                </div>
            </div>
        </div>
    </form>

@endsection
