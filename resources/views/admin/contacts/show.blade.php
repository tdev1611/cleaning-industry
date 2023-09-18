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
                        Chi tiết Liên hệ</h1>
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
                        <li class="breadcrumb-item text-muted">Chi tiết liên hệ</li>
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

                                <div class="card shadow-sm">
                                    <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle=""
                                        data-bs-target="#kt_docs_card_collapsible">
                                        <h3 class="card-title">Chi tiết liên hệ</h3>
                                       
                                        <div class="card-toolbar ">
                                            <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">Quay
                                                lại</a>
                                        </div>
                                    </div>
                                    <div id="kt_docs_card_collapsible" class="collapse show">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-4 " style="margin-bottom:25px">
                                                    <b>Tên khách hàng</b>
                                                </div>
                                                <div class="col-8">
                                                    {{ $contact->name }}
                                                </div>

                                                <div class="col-4" style="margin-bottom:25px">
                                                    <b>Số điện thoại</b>
                                                </div>
                                                <div class="col-8">
                                                    {{ $contact->phone }}
                                                </div>
                                                <div class="col-4" style="margin-bottom:25px">
                                                    <b>Dịch vụ</b>
                                                </div>
                                                <div class="col-8">
                                                    {{ $contact->service->title }}
                                                </div>
                                                <div class="col-4" style="margin-bottom:25px">
                                                    <b>Địa chỉ</b>
                                                </div>
                                                <div class="col-8">
                                                    {{ $contact->address }}
                                                </div>

                                                <div class="col-12">
                                                    <!--begin::Accordion-->
                                                    <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                                                        <!--begin::Item-->
                                                        <div class="mb-5">
                                                            <!--begin::Header-->
                                                            <div class="accordion-header py-3 d-flex"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#kt_accordion_2_item_1">
                                                                <span class="accordion-icon">
                                                                    <i class="fa-solid fa-right-long">
                                                                        <span class="path1"></span><span
                                                                            class="path2"></span>
                                                                    </i>
                                                                </span>
                                                                <h3 class="fs-4 fw-semibold mb-0 ms-4">
                                                                    Ghi chú
                                                                </h3>
                                                            </div>
                                                            <!--end::Header-->

                                                            <!--begin::Body-->
                                                            <div id="kt_accordion_2_item_1" class="fs-6 collapse show ps-10"
                                                                data-bs-parent="#kt_accordion_2">

                                                                <p>
                                                                    {{ $contact->note ? $contact->note : 'Không có ghi chú' }}

                                                                </p>
                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                        <!--end::Item-->


                                                    </div>
                                                    <!--end::Accordion-->
                                                </div>


                                                <div class="col-12">
                                                    <div class="col-4 mt-4" style="margin-bottom:25px">
                                                        <b>Trạng thái</b>
                                                    </div>
                                                    <div class="col-8 mt-4">
                                                        <select class="form-select form-select-lg mb-3"
                                                            aria-label="Large select example" name="status" id="status">
                                                            <option class="bg-warning"
                                                                @if (optional($contact)->status == 1) selected @endif
                                                                value="1">
                                                                Chờ phản hồi
                                                            </option>
                                                            <option class="bg-success"
                                                                @if (optional($contact)->status == 2) selected @endif
                                                                value="2">
                                                                Đã
                                                                phản hồi
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <i class="badge bg-primary"> {{ $contact->created_at }}</i>
                                        </div>
                                    </div>
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


        {{-- update --}}
        <script>
            $(document).ready(function() {
                $("#status").change(function() {
                    var status = $(this).val();
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    $.ajax({
                        type: 'put',
                        url: '{{ route('admin.contacts.update', $contact->id) }}',
                        data: {
                            status: status
                        },
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                                .then((result) => {
                                    // location.reload();
                                })
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire({
                                icon: 'error',
                                title: error.error,
                                showConfirmButton: false,
                                timer: 2000
                            }).then((result) => {

                            })
                        }
                    });
                });
            });
        </script>
        <script>
            // $('#status').click(function(e) {
            //     let op = $('#status option').val();

            //     console.log(op);
            //     e.preventDefault();


            // })
        </script>
    @endsection
