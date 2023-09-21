@extends('admin.layout')
@section('content')
    <x-admin.tiny-edit />
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Banner </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.home') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted"> Cài đặt banner </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <!--end::Toolbar container-->
            {{-- component alert --}}
            <x-admin.alert-notification />
        </div>
        {{-- content --}}
        <div class="lg-12 py-3 container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 ">
                        {{-- content --}}
                        <form method="POST"
                            action="{{ isset($setting) ? route('admin.setting.update', $setting->id) : route('admin.setting.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if (isset($setting))
                                @method('PUT')
                            @endif
                            @csrf

                            <div class="mb-3 ">
                                <label for="name" class="form-label"> Tên website </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="vd: Công ty vệ sinh sóng xanh"
                                    value="{{ old('name', isset($setting) ? $setting->name : '') }}">
                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label"> Tiêu đề trang chủ </label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Tiêu đề"
                                        value="{{ old('title', isset($setting) ? $setting->title : '') }}">
                                    @error('title')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6"">
                                    <label for="meta_title" class="form-label"> Tiêu đề SEO </label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                                        placeholder="Tiêu đề seo vd: tên công ty"
                                        value="{{ old('title', isset($setting) ? $setting->meta_title : '') }}">
                                    @error('meta_title')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-12"">
                                <label for="meta_title" class="form-label">Mô tả ngắn- SEO</label>
                                <textarea name="meta_desc" id="meta_desc" cols="30" rows="10" placeholder="Mô tả seo" class="form-control">{{ old('meta_desc', isset($setting) ? $setting->meta_desc : '') }}</textarea>
                                @error('meta_desc')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12"">
                                <label for="keyword" class="form-label"> Từ khóa SEO </label>
                                <input type="text" class="form-control" name="keyword" id="keyword"
                                    placeholder="vd: Công ty sóng xanh"
                                    value="{{ old('title', isset($setting) ? $setting->keyword : '') }}">
                                @error('keyword')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12"">
                                <label for="og_url" class="form-label"> LINK WEBSITE </label>
                                <input type="text" class="form-control" name="og_url" id="og_url"
                                    placeholder="vd: congtysongxanh.com"
                                    value="{{ old('title', isset($setting) ? $setting->og_url : '') }}">
                                @error('og_url')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6"">
                                    <label for="title" class="form-label"> Logo Web </label>
                                    <input type="file" class="form-control" name="logo" id="logo"
                                        placeholder="Tiêu đề">
                                    @error('logo')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Trạng thái </label>
                                    <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                        name="status" id="status">
                                        <option value="1" @if (isset($setting) && $setting->status == 1) selected @endif
                                            {{ old('status') == 2 ? 'selected' : '' }}>
                                            Hiển thị
                                        </option>
                                        <option value="2" @if (isset($setting) && $setting->status == 2) selected @endif
                                            {{ old('status') == 2 ? 'selected' : '' }}> Ẩn
                                        </option>
                                    </select>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                @isset($setting->logo)
                                    <div>
                                        <img height="200" width="200" style="border:1px solid #000"
                                            src="{{ url($setting->logo) }}" alt="logo-web">
                                    </div>
                                @endisset


                            </div>

                            <div class="input-group mb-3 " style="margin-top:50px">
                                <button type="submit" class="btn btn-primary">Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
