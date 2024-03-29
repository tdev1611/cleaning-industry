@extends('admin.layout')
@section('content')
    <style>
        #delete:hover {
            color: red;
            padding: 5px
        }

        #update:hover {
            color: greenyellow;
            padding: 5px
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
                        Thành viên</h1>
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
                        <li class="breadcrumb-item text-muted">Danh sách</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                    {{-- alert --}}


                </div>
            </div>
            <!--end::Toolbar container-->
            {{-- alert --}}
            {{-- component alert --}}
            {{-- <x-admin.alert-notification /> --}}
        </div>
        <div class="lg-12 py-3 container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Danh sách thành viên</h4>
                                <div class="table-responsive">
                                    <table id="myTable"
                                        class="table table-hover table-row-dashed table-row-gray-300 gy-7 table-striped">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Điện thoại</th>
                                                <th>Mã giới thiệu</th>
                                                <th>Mã được mời</th>
                                                <th>Số tiền</th>
                                                <th>Vai trò</th>
                                                <th>Trạng thái</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


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
        {{-- <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                    "processing": true,
                    "serverSide": true,
                    ajax: "{{ route('admin.users.data') }}",
                    "columns": [{
                            "data": "id"
                        },
                        {
                            "data": "name"
                        },
                        {
                            "data": "phone"
                        },
                        {
                            "data": "referral_code"
                        },
                        {
                            "data": "referrer_code"
                        },
                        {
                            "data": "balance"
                        },
                        {
                            "data": "role",
                            "render": function(data, type, full, meta) {
                                if (data === 1) {
                                    return "<span class =''>Thành viên</span>";
                                } else if (data === 2) {
                                    return "<span class ='badge bg-primary '>Admin</span>";
                                }
                            }
                        },
                        {
                            "data": "status",
                            "render": function(data, type, full, meta) {
                                if (data === 1) {
                                    return "<span class ='badge bg-success'>Hoạt động</span>";
                                } else if (data === 2) {
                                    return "<span class ='badge bg-danger'>Vô hiệu hóa</span>";
                                } else {
                                    return 'Khác';
                                }
                            }

                        },

                        {
                            "data": "id",

                            "render": function(data, type, full, meta) {
                                var editLink = '{{ route('admin.users.edit', ':id') }}';
                                var deleteLink = '{{ route('admin.users.delete', ':id') }}';
                                editLink = editLink.replace(':id', data);
                                deleteLink = deleteLink.replace(':id', data);
                                return `<a href=" ${editLink}"> <i id="update" class="fa-solid fa-pen-to-square"></i></a> / <a href=" ${deleteLink}" >  <i id="delete" class="fa-solid fa-delete-left"></i></a>`;
                            }
                            // ${deleteLink } 
                        },
                    ]
                });
            });
        </script> --}}
    @endsection
