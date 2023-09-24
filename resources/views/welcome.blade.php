@extends('client.layout')
@section('content')
    <!-- Demo styles -->
    <style>
        #service_title:hover {
            text-decoration: none;
        }

        #service_title h5 {
            margin-top: 10px;
            color: #000;
        }

        #service_title h5:hover {
            color: rgb(104, 100, 78);

        }
    </style>

    <main class="content-area">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                {{-- banner --}}
                <x-client.banner />

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
        </div>
        {{-- <div class="carousel slide" data-ride="carousel">
            <div id="banner-home-page" class="owl-carousel owl-theme">
                <div class="item active">
                    <a href="#">
                        <img class="owl-lazy d-block w-100"
                            data-src="https://vesinhcongnghiep.com/uploads/files/2022/04/28/dich-vu-ve-sinh-cong-nghiep-1.png"
                            alt="Dịch vụ vệ sinh công nghiệp năm sao đa dạng, làm sạch tối ưu sau 1 lần sử dụng" />
                    </a>
                </div>
             
            </div>
        </div> --}}


        <div class="message-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="box-text-top">
                            <h1 class="text-black">Vệ Sinh Sóng Xanh </h1>
                            <p class="text-intros webkit-box-3">

                                {!! Str::words($Introduce->service, 102, '...') !!}
                            </p>
                            <a href="{{ route('client.introduce.index',$Introduce->id) }}"
                                class="d-inline-flex justify-content-between align-items-center btn btn-primary">
                                Xem Thêm <span class="d-inline-flex justify-content-center align-items-center box-icon">
                                    {{-- <i class="d-flex lp-arrow-right"></i> --}}
                                </span></a>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="h-100 d-flex flex-column justify-content-center box-contact">
                            <div class="box-item">
                                <p class="text-title text-black">Liên hệ</p>
                                <p class="text ml-0"><b>Phone</b>:
                                    <a href="">
                                        {{ $contact_Info ? $contact_Info->phone : '' }}
                                    </a>
                                </p>
                                <p class="text ml-0 mb-0"><b>Email</b>:
                                    <a href="mailto: {{ $contact_Info ?? $contact_Info->email }}">
                                        {{ $contact_Info ? $contact_Info->email : null }}
                                    </a>
                                </p>
                            </div>
                            <div class="box-line"></div>
                            <div class="box-item">
                                <p class="text-title text-black">Địa chỉ</p>
                                <p class="text ml-0 mb-0">
                                    {{ $contact_Info ? $contact_Info->address : null }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <section class="List_service section_p">

            <div id="events" class="events-box">
                    <div class="container">
                        <div class="row">
                            @forelse ($services as $service)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="event-inner">
                                        <div class="event-img">
                                            <a href="{{ route('client.services.detail', $service->slug) }}">
                                                <img class="img-fluid" src="{{ url($service->image) }}"
                                                    alt="{{ $service->title }}" />
                                            </a>

                                        </div>
                                        <a href="{{ route('client.services.detail', $service->slug) }}" class="text-none">
                                            <h6 class="text-center"style="font-weight: 700;color: #000; font-size:20px">
                                                {{ $service->title }}
                                            </h6>
                                        </a>
                                        <p class="mt-3"> {{ Str::words($service->desc, 20, '...') }}</p>
                                        <a href="{{ route('client.services.detail', $service->slug) }}"
                                            title="{{ $service->title }}" id="view-detail">Xem chi tiết >
                                        </a>
                                    </div>
                                </div>
                            @empty
                                Chưa có dịch vụ nào
                            @endforelse


                        </div>
                    </div>
                </div>
      

        </section> --}}
        <section class="List_service section_p">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center title_main">
                            <h2>DỊCH VỤ VỆ SINH SÓNG XANH </h2>
                            <p>Công ty Dịch Vụ Vệ Sinh có đa dạng các dịch vụ vệ sinh chất lượng, uy tín, chuyên
                                nghiệp, ...</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @forelse ($services as $service)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="d-flex flex-column h-100 overflow-hidden service_items blogs_m">
                                <div class="blogs_i">
                                    <a href="{{ route('client.services.detail', $service->slug) }}">
                                        {{-- data-src="{{ url($service->image) }}" --}}
                                        <img class="lazy" src="{{ url($service->image) }}" title="{{ $service->title }}"
                                            src=" " alt="{{ $service->title }}">
                                    </a>
                                </div>
                                <a id="service_title" class="mb-auto"
                                    href="{{ route('client.services.detail', $service->slug) }}">
                                    <h5 class="text-center">
                                        {{ $service->title }}
                                    </h5>
                                </a>
                                <p class="webkit-box-3 box-intro">
                                    {{ Str::words($service->desc, 22, '...') }}
                                </p>
                                <a class="btn__link blog_service_link"
                                    href="{{ route('client.services.detail', $service->slug) }}">
                                    <span>Chi Tiết</span>
                                    <i class="fa-solid fa-arrow-right fa-fade"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        Chưa có dịch vụ nào
                    @endforelse




                </div>
            </div>
            <div class="text-center mt-2">
                <p class="text_link">
                    <a class="category_link" href="{{ route('client.services.index') }}">Hãy xem thêm các bài viết của
                        chúng tôi!</a>
                </p>
            </div>
            </div>
        </section>

        <section class="section-my-team">
            <div class="container">
                <div class="text-center box-text">
                    <h2 class="text-black">ĐỘI VỆ SINH SÓNG XANH </h2>
                    <div class="reaction justify-content-center" itemscope itemtype="https://schema.org/CreativeWorkSeries">


                        <div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                            <meta itemprop="ratingValue" content="4.1">
                            <meta itemprop="bestRating" content="5">
                            <meta itemprop="ratingCount" content="106">
                        </div>
                    </div>
                    <p>Một trong những yếu tố làm nên uy tín và chất lượng dịch vụ ,...</p>
                    <p class="text-description mb-0">“TRUNG THỰC - CHĂM CHỈ - TẬN TÂM -TẬN LỰC”</p>
                </div>
                <table class="table table-bordered table-hover">

                    <tbody>
                        <tr>
                            <td>Số lượng</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>

                        <tr>
                            <td>@fat ádsa</td>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <td class="table-primary">Hotline liên hệ</td>
                            <td colspan="2">Thornton</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>


        <section class="section-process">
            <div class="container">
                <div class="text-center">
                    <h2>QUY TRÌNH VỆ SINH CÔNG NGHIỆP </h2>
                    <p class="mb-0 mx-auto process-intro">Quy trình vệ sinh công nghiệp tỉ mỉ
                        từng bước cụ
                        thể, đảm bảo mang đến cho công trình một diện mạo mới, sạch sẽ và an toàn.
                    </p>
                </div>
                <div class="d-flex flex-wrap justify-content-center list-item-process">
                    @foreach ($procedures as $procedure)
                        <div class="bg-white text-center item-process" id="step1">
                            <div class="bg-white d-flex justify-content-center align-items-center item-number">
                                <span class="d-flex justify-content-center align-items-center">
                                    {{ $procedure->ordinal }}
                                </span>
                            </div>
                            <h3>{{ $procedure->title }}</h3>
                            <p class="text-justify mb-0  item-intro">
                                {{ $procedure->desc }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="list-news">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center title_main">
                            <h2>TIN TỨC MỚI NHẤT CỦA <span class="text-black">NĂM SAO</span></h2>
                            <p>Không chỉ là đơn vị đầu ngành cung cấp dịch vụ dọn dẹp chuyên nghiệp, Năm Sao còn là
                                cầu nối giữa
                                doanh nghiệp và người lao động, chúng tôi luôn sẵn sàng đi tiên phong trong các
                                phong trào hỗ trợ,
                                giúp đỡ các nơi gặp khó khăn và mang đến nhiều niềm vui trong công việc cho nhân
                                viên của mình. Hãy
                                theo dõi những bài viết mới nhất của chúng tôi bên dưới đây.</p>
                        </div>
                    </div>
                </div>
                <div class="row" id="news">
                    <div class="col-md-6 col-lg-4 mb-4" v-for="(item, index) in items" :key="index">
                        <div class="h-100 d-flex flex-column justify-content-between list-news_items blogs_m">
                            <div class="list_news_item_img blogs_i">
                                <a :href="servicesDetailRoute.replace(':slug', item.slug)">
                                    <img class="lazy" :src="'{{ url('') }}' + '/' + item.image"
                                        :alt="item.title">
                                    {{-- onload="pagespeed.CriticalImages.checkImageForCriticality(this);" --}}
                                </a>
                            </div>
                            <a class="mb-auto text-decoration-none" id="service_title"
                                :href="servicesDetailRoute.replace(':slug', item.slug)">
                                <h3 class="title ">
                                    @{{ item.title }}
                                </h3>
                            </a>
                            <p class="webkit-box-3 box-intro-news">
                                <span v-html="formatDescription[index]"></span>
                                <span>...</span>
                            </p>
                            <div class="">
                                <a class="btn__link blog_news_link " id="service_title"
                                    :href="servicesDetailRoute.replace(':slug', item.slug)">
                                    <span style="color: #000;">Chi Tiết</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <section class="section-faqs">
            <div class="container">
                <div class="text-center">
                    <h2>CÂU HỎI THƯỜNG GẶP VỀ DỊCH VỤ VỆ SINH SÓNG XANH</h2>
                    <p>Với các câu hỏi về đơn giá vệ ,...!</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bg-white box-item-faqs">
                            <input class="d-none toggle" type="checkbox" id="question1">
                            <label for="question1" class="form-label-question">
                                <h3 class="mb-0 annwer">Câu hỏi 1</h3>
                            </label>
                            <div class="box-question-body">
                                <p class="mb-0"> Trả lời câu hỏi 1.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-white box-item-faqs">
                            <input class="d-none toggle" type="checkbox" id="question2">
                            <label for="question2" class="form-label-question">
                                <h3 class="mb-0 annwer">Câu hỏi 2</h3>
                            </label>
                            <div class="box-question-body">
                                <p class="mb-0"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat,
                                    necessitatibus?.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-white box-item-faqs">
                            <input class="d-none toggle" type="checkbox" id="question3">
                            <label for="question3" class="form-label-question">
                                <h3 class="mb-0 annwer">Câu hỏi 3</h3>
                            </label>
                            <div class="box-question-body">
                                <p class="mb-0"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, ex?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-white box-item-faqs">
                            <input class="d-none toggle" type="checkbox" id="question4">
                            <label for="question4" class="form-label-question">
                                <h3 class="mb-0 annwer">Câu hỏi 1</h3>
                            </label>
                            <div class="box-question-body">
                                <p class="mb-0"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum quibusdam
                                    est qui veritatis velit exercitationem obcaecati, distinctio illum voluptatem facere..
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <span class="box-circle box-circle-1"></span> --}}
            {{-- <span class="box-circle box-circle-2"></span> --}}
            {{-- <span class="d-none d-md-block box-circle box-circle-3"></span> --}}
            {{-- <span class="box-circle box-circle-4"></span> --}}
        </section>

        <section class="section-carousel-contruction">
            <div class="container-fluid">
                <h2 class="text-center">HÌNH ẢNH VỆ SINH CÔNG TRÌNH </h2>
                <div class="slick-contruction">

                    <div class="item-img">
                        <a href="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                            data-fancybox="gallery" id="single_image16">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                                alt="" />
                        </a>
                    </div>
                    <div class="item-img">
                        <a href="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                            data-fancybox="gallery" id="single_image16">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                                alt="" /></a>
                    </div>
                    <div class="item-img">
                        <a href="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                            data-fancybox="gallery" id="single_image16">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                                alt="" /></a>
                    </div>
                    <div class="item-img">
                        <a href="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                            data-fancybox="gallery" id="single_image16">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                                alt="" /></a>
                    </div>
                    <div class="item-img">
                        <a href="uploads/files/2022/04/18/banner-project-vncn-16.jpg" data-fancybox="gallery"
                            id="single_image16">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                                alt="" /></a>
                    </div>
                    <div class="item-img">
                        <a href="uploads/files/2022/04/18/banner-project-vncn-16.jpg" data-fancybox="gallery"
                            id="single_image16">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                                alt="" /></a>
                    </div>
                </div>
            </div>


            <!-- End Gallery -->
        </section>
        {{-- google-map --}}
        <x-client.google-map />
        {{-- end-gg-map --}}

    </main>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#news',
            data: {
                items: [],
                servicesDetailRoute: @json(route('client.news.detail', ['slug' => ':slug']))

            },
            mounted() {
                // data from backend
                this.items = {!! json_encode($news) !!};
            },
            computed: {
                formatDescription: function() {
                    return this.items.map(function(item) {
                        return item.content.slice(0, 100);
                    });
                }
            },
        });
    </script>


    <!-- Initialize Swiper -->
    <script>
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            on: {
                autoplayTimeLeft(s, time, progress) {
                    progressCircle.style.setProperty("--progress", 1 - progress);
                    progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                }
            }
        });
    </script>
@endsection
