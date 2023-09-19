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
                        Giới thiệu công ty </h1>
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
                        <li class="breadcrumb-item text-muted"> Tạo giới thiệu công ty</li>
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
                            action="{{ isset($introduce) ? route('admin.introduce.update', $introduce->id) : route('admin.introduce.store') }}">
                            @csrf
                            @if (isset($introduce))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="title" class="form-label"> Tên công ty </label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Tên của công ty "
                                    value="{{ old('title', isset($introduce) ? $introduce->title : '') }}">
                                @error('title')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label"> Slug </label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    placeholder="Slug-seo "
                                    value="{{ old('slug', isset($introduce) ? $introduce->slug : '') }}">
                                @error('slug')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label"> Địa chỉ công ty </label>
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="Địa chỉ công ty "
                                    value="{{ old('title', isset($introduce) ? $introduce->address : '') }}">
                                @error('address')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="phone" class="form-label"> Số điện thoại đại diện </label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Điện thoại "
                                        value="{{ old('phone', isset($introduce) ? $introduce->phone : '') }}">
                                    @error('phone')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-8">
                                    <label for="managed_by" class="form-label"> Quản lý bởi </label>
                                    <input type="text" class="form-control" name="managed_by" id="managed_by"
                                        placeholder="vd:Chi cục thuế,.. "
                                        value="{{ old('managed_by', isset($introduce) ? $introduce->managed_by : '') }}">
                                    @error('managed_by')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="license_date" class="form-label"> Ngày cấp phép </label>
                                    <input type="text" class="form-control" name="license_date" id="license_date"
                                        placeholder="Ngày cấp phép"
                                        value="{{ old('email', isset($introduce) ? $introduce->license_date : '') }}">
                                    @error('license_date')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3  col-md-6">
                                    <label for="tax_code" class="form-label"> Mã số thuế </label>
                                    <input type="text" class="form-control" name="tax_code" id="tax_code"
                                        placeholder="Mã số thuế"
                                        value="{{ old('tax_code', isset($introduce) ? $introduce->tax_code : '') }}">
                                    @error('tax_code')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="service" class="form-label">Dịch vụ</label>
                                <textarea name="service" id="content" cols="30" rows="10"
                                    placeholder="VD: Công ty chuyên cung cấp giải pháơ,.... ..." class="form-control">{{ old('service', isset($introduce) ? $introduce->service : '') }}</textarea>
                                @error('service')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="status" class="form-label">Trạng thái </label>
                                <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                    name="status" id="status">
                                    <option value="1" @if (isset($introduce) && $introduce->status == 1) selected @endif
                                        {{ old('status') == 2 ? 'selected' : '' }}>
                                        Hiển thị
                                    </option>
                                    <option value="2" @if (isset($introduce) && $introduce->status == 2) selected @endif
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

@section('js')
    {{-- update --}}

    <script></script>
@endsection
