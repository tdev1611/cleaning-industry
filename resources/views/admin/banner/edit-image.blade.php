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
                        Dịch vụ </h1>
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
                        <li class="breadcrumb-item text-muted">Tạo dịch vụ </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <a href="{{ route('admin.image-banner.index') }}" class="btn btn-primary">Quay lại</a>
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
                        {{-- component alert --}}

                        {{-- content --}}
                        <form method="POST" action="{{ route('admin.image-banner.update', $image->id) }}"
                            enctype="multipart/form-data">
                                @method('put')
                            @csrf


                            <div class="mb-3 col-md-6">
                                <label for="formFile" class="form-label">Ảnh - dịch vụ</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                                @error('image')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            @if (isset($image->image))
                                <label for="formFile" class="form-label">Ảnh đã đăng</label>
                                <div class="text-center">
                                    <div class="mb-3 col-md-6 mb-4" style="border:1px solid tan">

                                        <img height="200" width="200" src="{{ url($image->image) }}"
                                            alt="{{ $image->banner->name }}">

                                    </div>
                                </div>
                            @endif


                            <div class="mb-3 col-md-6">
                                <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                    name="banner_id" id="banner_id">
                                    <option value="{{ $image->banner->id }}">
                                        {{ $image->banner->name }}
                                    </option>
                                </select>
                                @error('banner_id')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>


                            <div class="input-group mb-3 mt-3">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
