@extends('admin.layout')
@section('content')
    <style>
        .dashboard-box {
            border-radius: 20px;
            padding: 20px;
            margin: 10px 0;
            border: 1px solid #dddddd;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .dashboard-box h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .dashboard-box p {
            font-size: 1rem;
            color: #777777;
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
                        Bảng điều khiển </h1>

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
                        <li class="breadcrumb-item text-muted">Dashboard</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>

            </div>
            <!--end::Toolbar container-->
        </div>
        {{-- content --}}
        <div class="lg-12 py-3 container">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-4">
                        <div class="dashboard-box" style="background-color: #7091F5">
                            <h2>Thành viên</h2>
                            <p style="color:#fff">
                            <h4>Total Users:
                            </h4>
                            </p>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="dashboard-box" style="background-color:#C08261">
                            <h2>Tổng phiên </h2>
                            <p style="color:#fff">
                            <h4>
                                Total :
                            </h4>
                            </p>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-4">
                        <div class="dashboard-box" style="background: #A2678A">
                            <h2>Đơn hàng</h2>
                            <p style="color: #fff">
                            <h4>
                                Total Orders:
                            </h4>
                            </p>
                        </div>
                    </div> --}}
                   
                    <div class="col-md-4">
                        <div class="dashboard-box" style="background: #C23373">
                            <h2>Tổng số lượng tiền rút </h2>
                            <p style="color:#fff">

                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-box" style="background: #C23373">
                            <h2>Tổng số lượng tiền nạp </h2>
                            <p style="color:#fff">

                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
