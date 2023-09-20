@extends('admin.layout')
@section('content')
    <style>
        #delete:hover {
            color: red;
            padding: 5px
        }

        #edit:hover {
            color: greenyellow;
            padding: 5px
        }

        option {
            color: gray;
        }
    </style>

    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Ảnh Banner</h1>
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
                        <li class="breadcrumb-item text-muted">Danh sách ảnh banner</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                    {{-- alert --}}


                </div>
            </div>
            <!--end::Toolbar container-->
            {{-- alert --}}
            {{-- component alert --}}
            <x-admin.alert-notification />
        </div>
        <div class="lg-12 py-3 container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Danh sách ảnh banner</h4>
                                <div class="table-responsive">
                                    <table id="myTable"
                                        class="table table-hover table-row-dashed table-row-gray-300 gy-7 table-striped">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                <th>Tên banner </th>
                                                <th>Ảnh</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($images as $image)
                                                <tr>
                                                    <td>
                                                        <span class="badge bg-primary">
                                                            {{ $image->banner->name }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <img height="60" src="{{ url($image->image) }}"
                                                            alt="{{ $image->name }}">
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('admin.image-banner.edit', $image->id) }}">
                                                            <i id="edit" class="fa-solid fa-pen-to-square"></i>
                                                        </a>/
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $image->id }}">
                                                            <i id="delete" class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>

                                                </tr>


                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $image->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa dịc
                                                                    vụ <b><i> {{ $image->name }}</i></b> </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa ảnh?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.image_banner.delete', $image->id) }}">Xóa</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @empty
                                                <td colspan="6">Chưa có ảnh banner nào!</td>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('js')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    // order: [
                    //     [0, 'desc']
                    // ],

                });
            });
        </script>
    @endsection
