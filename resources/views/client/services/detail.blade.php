@extends('client.layout')
@section('title',$service->title)
@section('content')
    <div class="container body articleDetail">
        <div class="row mb-5">
            <div class="col-md-8 col-lg-8">
                <div>
                    <h1>{{ $service->title }}</h1>
                </div>
                <div class="rating_date mb-3">
                    <div class="reaction" itemscope itemtype="">
                    </div>
                    <div class="date">
                        <i class="fa-solid fa-calendar-days mr-2 mt-1"></i>
                        <span>{{ $service->created_at }}</span>
                    </div>
                </div>
                <article class="article-content" id="content">
                    <p id="desc"> {{ $service->desc }}</p>

                    {!! $service->content !!}
                </article>
                {{-- <p class="cta-content"><a onclick="return gtag_report_conversion('tel:0936750009');"
                            href="tel:0936750009"><img class="nofancybox lazy"
                                data-src="https://vesinhcongnghiep.com/uploads/files/2021/04/13/vscn-cta.gif"
                                alt="Liên hệ tư vấn - Vệ sinh công nghiệp">
                        </a>
                    </p> --}}
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="side_sticky">

                    <nav class="s-sideNav">
                        <p class="hr-line"></p>
                        <div class="s-sideNavName">
                            TIN TỨC MỚI
                        </div>
                        <article class="s-sideNavArticle">
                            <div class="box_list_news">
                                <img class="lazy " src="../themes/vscn-2020/assets/owlcarousel/assets/ajax-loader.gif"
                                    data-src="https://vesinhcongnghiep.com/uploads/files/2023/04/14/thumbs/May-nuoc-nong-1-1--105x95.png"
                                    alt="" />
                                <h3 class="title">
                                    <a href="phan-biet-cac-loai-may-nuoc-nong-va-cach-chon-mua-san-pham-phu-hop.html">
                                        Phân biệt các loại máy nước nóng và cách chọn mua sản phẩm phù hợp
                                    </a>
                                </h3>
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa-solid fa-calendar-days"></i>

                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </nav>
                    <nav class="s-sideNav mt-5">
                        <p class="hr-line"></p>
                        <div class="s-sideNavName">
                            DANH MỤC TIN TỨC
                        </div>
                        <ul class="links categorys_links">
                            <li class="d-flex justify-content-between">
                                <a href="../tin-cong-ty.html">
                                    Tin Công Ty
                                </a>
                                <a href="../tin-cong-ty.html"><i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    {{-- <nav class="s-sideNav mt-5">
                            <div class="advertise-slider-detail owl-carousel owl-theme">
                                <div class="item"><a href="https://zalo.me/0936750009"><img class="owl-lazy d-block"
                                            data-src="https://vesinhcongnghiep.com/uploads/files/2021/04/09/giam-gia-ve-sinh-cong-nghiep.png"
                                            alt="Giảm giá 15% Khi đặt lịch hôm nay" /></a></div>
                                <div class="item"><a href="tel:0936750009"><img class="owl-lazy d-block"
                                            data-src="https://vesinhcongnghiep.com/uploads/files/2021/04/09/giam-gia-ve-sinh-cong-nghiep-2.png"
                                            alt="Giảm giá 15% Khi đặt lịch hôm nay" /></a></div>
                            </div>
                        </nav> --}}
                </div>
            </div>
        </div>
        <div class="mt-5 text-center title_main">
            <h2>CÁC DỊCH VỤ KHÁC </h2>
        </div>

        <div class="row ">
            @forelse ($services as $service)
                <div class="col-md-6 col-lg-4 pl-1 pr-1">
                    <div class="tips-main media">
                        <div class="tips-img">
                            <a href="{{ route('client.services.detail', $service->slug) }}">
                                <img class="lazy" src="{{ url($service->image) }}" alt="{{ $service->title }}" />
                            </a>
                        </div>
                        <div class="tips-content w-100"><a
                                href="bong-den-led-cong-nghe-tiet-kiem-nang-luong-va-lau-doi.html">
                                <h3 class="webkit-box-2 title">{{ $service->title }}</h3>
                            </a>
                            <p class="webkit-box-2 content">
                                {{ Str::words($service->desc, 18, '...') }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                Chưa có các bài viết về dịch vụ
            @endforelse



        </div>

    </div>
@endsection
