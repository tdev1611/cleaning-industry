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
                        Liên hệ</h1>
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
                        <li class="breadcrumb-item text-muted">Danh sách liên hệ của khách hàng</li>
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
                                <h4 class="card-title">Danh sách liên hệ</h4>
                                <div class="table-responsive">
                                    <table id="myTable"
                                        class="table table-hover table-row-dashed table-row-gray-300 gy-7 table-striped">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                <th>#</th>
                                                <th>Tên khách hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Dịch vụ liên hệ</th>
                                                <th>Địa chỉ</th>
                                                <th>Ghi chú</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày tạo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($contacts as $contact)
                                                <tr>
                                                    <td scope="row">{{ $contact->id }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td> <span class="badge bg-primary">{{ $contact->phone }}</span></td>
                                                    <td class="text-primary">{{ $contact->service->title }}</td>
                                                    <td> {{ Str::words($contact->address, 5, '...') }}</td>
                                                    <td> {{ $contact->note? Str::words($contact->note, 5, '...'): 'Không có' }}</td>

                                                    <td>
                                                        @if ($contact->status == 1)
                                                            <a href="{{ route('admin.contacts.show', $contact->id) }}">
                                                                <span class="badge bg-warning">Chờ phản hồi</span>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('admin.contacts.show', $contact->id) }}">
                                                                <span class="badge bg-success">Đã phản hồi</span>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>{{ $contact->created_at }}</td>
                                                    <td class="" style="width:10%">
                                                        <a href="{{ route('admin.contacts.show', $contact->id) }}">
                                                            {{-- <i id="edit" class="fa-solid fa-pen-to-square"></i> --}}
                                                            <span class="badge bg-primary">Chi tiết</span>
                                                        </a>
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $contact->id }}">
                                                            <span class="badge bg-danger">Xóa</span>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $contact->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa dịc
                                                                    vụ <b><i> {{ $contact->title }}</i></b> </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa liên hệ ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.contacts.delete', $contact->id) }}">Xóa</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @empty
                                                <td colspan="6">Chưa có sản phẩm nào</td>
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
                    order: [
                        [0, 'desc']
                    ],

                });
            });
        </script>
    @endsection
