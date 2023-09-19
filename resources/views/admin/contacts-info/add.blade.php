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
                        Thông tin liên hệ </h1>
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
                        <li class="breadcrumb-item text-muted">Tạo thông tin </li>
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
                            action="{{ isset($contact) ? route('admin.contact-info.update', $contact->id) : route('admin.contact-info.store') }}">
                            @csrf
                            @if (isset($contact))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="phone" class="form-label"> Số điện thoại </label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="vd: 0335353 - 934343 - 34343 "
                                    value="{{ old('phone', isset($contact) ? $contact->phone : '') }}">
                                @error('phone')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"> Email </label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                    value="{{ old('email', isset($contact) ? $contact->email : '') }}">
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label"> Địa chỉ công ty </label>
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="Địa chỉ công ty"
                                    value="{{ old('address', isset($contact) ? $contact->address : '') }}">
                                @error('address')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>


                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="link" class="form-label"> Đường dẫn website </label>
                                    <input class="form-control" type="text" name="link" id="link"
                                        placeholder="vd: vesinhsongxanh.com"
                                        value="{{ old('link', isset($contact) ? $contact->link : '') }}">
                                    @error('link')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Trạng thái </label>
                                    <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                        name="status" id="status">
                                        <option value="1" @if (isset($contact) && $contact->status == 1) selected @endif
                                            {{ old('status') == 2 ? 'selected' : '' }}>
                                            Hiển thị
                                        </option>
                                        <option value="2" @if (isset($contact) && $contact->status == 2) selected @endif
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
