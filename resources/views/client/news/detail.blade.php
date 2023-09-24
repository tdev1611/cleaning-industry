@extends('client.layout')
@section('title', $new->title)
@section('content')
    <div class="container body articleDetail">
        <div class="row mb-5">
            <div class="col-md-8 col-lg-8">
                <div>
                    <h1>{{ $new->title }}</h1>
                </div>
                <div class="rating_date mb-3">
                    <div class="reaction" itemscope itemtype="">
                    </div>
                    <div class="date">
                        <i class="fa-solid fa-calendar-days mr-2 mt-1"></i>
                        <span>{{ $new->created_at }}</span>
                    </div>
                </div>
                <article class="article-content" id="content">
                    <p id="desc"> {!! Str::words($new->content, 22, '...') !!}</p>

                    {!! $new->content !!}
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
                            <x-client.latest-news />
                        </article>
                    </nav>
                    <nav class="s-sideNav mt-5">
                        <p class="hr-line"></p>
                        <div class="s-sideNavName">
                            DANH MỤC TIN TỨC
                        </div>
                        <x-client.category-new />
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
            <h2>CÁC TIN TỨC <span style="text-transform: uppercase">
                    {{ $category->title }}
                </span>
            </h2>
        </div>

        <div class="row ">
            @forelse ($category->newLimit as $item)
                <div class="col-md-6 col-lg-4 pl-1 pr-1">
                    <div class="tips-main media">
                        <div class="tips-img">
                            <a href="{{ route('client.news.detail', $item->slug) }}">
                                <img style="height: 100px; width: 100px;" class="lazy"
                                    src="{{ url($item->image) }}" alt="{{ $item->title }}" />
                            </a>
                        </div>
                        <div class="tips-content w-100"><a href="{{ route('client.news.detail', $item->slug) }}">
                                <h3 class="webkit-box-2 title">{{ $item->title }}</h3>
                            </a>
                            <p class="webkit-box-2 content">
                                {!! Str::words($item->content, 18, '...') !!}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                Chưa có các bài viết tin tức <b><i> {{ $category->title }}</i></b>
            @endforelse



        </div>

    </div>
@endsection
