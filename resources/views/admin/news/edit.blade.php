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
                        Bài viết tin tức </h1>
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
                        <li class="breadcrumb-item text-muted">Sửa bài viết </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Quay lại</a>
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
                        <form method="POST" action="{{ route('admin.news.update', $new->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Tiêu đề </label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Tên tiêu đề dịch vụ" value="{{ old('title', $new->title) }}">
                                @error('title')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label"> Slug </label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="slug"
                                    value="{{ old('slug', $new->slug) }}">
                                @error('slug')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea name="content" id="content" cols="30" rows="10" placeholder="nội dung bài viết"
                                    class="form-control">{{ old('content', $new->content) }}</textarea>
                                @error('content')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="ordinal" class="form-label">Thứ tự </label>
                                    <input class="form-control" type="number" name="ordinal" id="ordinal"
                                        placeholder="Thứ tự sắp xếp" value="{{ old('ordinal', $new->ordinal) }}">
                                    @error('ordinal')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category_new_id" class="form-label"> Danh mục </label>
                                    <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                        name="category_new_id" id="category_new_id">

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $new->category_new_id == $category->id ? 'selected' : null }}
                                                {{ old('category_new_id') == $category->id ? 'selected' : '' }}
                                                >
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_new_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="formFile" class="form-label">Ảnh - dịch vụ</label>
                                    <input class="form-control" type="file" name="image" id="formFile">
                                    @error('image')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Trạng thái </label>
                                    <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                        name="status" id="status">
                                        <option @if (optional($new)->status == 1) selected @endif value="1"
                                            {{ old('status') == 1 ? 'selected' : '' }}>
                                            Hiển thị
                                        </option>

                                        <option @if (optional($new)->status == 2) selected @endif value="2"
                                            {{ old('status') == 2 ? 'selected' : '' }}> Ẩn
                                        </option>
                                    </select>

                                    @error('status')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                @if (isset($new->image))
                                    <div class="mb-4">
                                        <img src="{{ url($new->image) }}" height="100" alt="">
                                    </div>
                                @endif
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