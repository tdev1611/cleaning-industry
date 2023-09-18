@extends('client.layout')
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
    <main class="content-area">
        <div class="carousel slide" data-ride="carousel">
            <div id="banner-home-page" class="owl-carousel owl-theme">
                <div class="item active">
                    <a href="#"><img class="owl-lazy d-block w-100"
                            data-src="https://vesinhcongnghiep.com/uploads/files/2022/04/28/dich-vu-ve-sinh-cong-nghiep-1.png"
                            alt="Dịch vụ vệ sinh công nghiệp năm sao đa dạng, làm sạch tối ưu sau 1 lần sử dụng" />
                    </a>
                </div>
                <div class="item ">
                    <a href="#">
                        <img class="owl-lazy d-block w-100"
                            data-src="https://vesinhcongnghiep.com/uploads/files/2022/04/28/dich-vu-ve-sinh-cong-nghiep-2.png"
                            alt="Năm sao giúp bạn làm sạch mọi không gian với dịch vụ vệ sinh chuyên nghiệp" />
                    </a>
                </div>
                <div class="item ">
                    <a href="#">
                        <img class="owl-lazy d-block w-100"
                            data-src="https://vesinhcongnghiep.com/uploads/files/2022/04/28/dich-vu-lau-kinh-3.png"
                            alt="Dịch vụ lau kính đánh bay vết bẩn mọi công trình" />
                    </a>
                </div>
                <div class="item "><a href="#">
                        <img class="owl-lazy d-block w-100"
                            data-src="https://vesinhcongnghiep.com/uploads/files/2022/04/28/dich-vu-giat-ghe-sofa-4.png"
                            alt="Dịch vụ giặt thảm, giặt ghế sofa và giặt ghế văn phòng chất lượng đảm bảo" />
                    </a>
                </div>
            </div>
        </div>
        <div class="message-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="box-text-top">
                            <h1 class="text-black">Vệ Sinh Công Nghiệp Năm Sao - Dịch Vụ Vệ Sinh Uy Tín TPHCM</h1>
                            <p class="text-intros webkit-box-3">Công ty Vệ Sinh Công Nghiệp Năm Sao - Chuyên cung
                                cấp dịch vụ vệ
                                sinh tại TPHCM và các tỉnh thành lân cận với đội ngũ chuyên viên kinh nghiệm, tận
                                tâm, hệ thống chuyên
                                nghiệp, cùng giá cả phù hợp. Năm Sao tự tin luôn đem đến cho khách hàng những trải
                                nghiệm tốt nhất
                                cùng kết quả bàn giao sau dịch vụ tuyệt vời. Trân trọng kính chúc quý khách hàng vui
                                vẻ, hạnh phúc,
                                thành công. Vệ Sinh Công Nghiệp bao gồm các dịch vụ chi tiết như sau: vệ sinh nhà
                                cửa, vệ sinh văn
                                phòng, vệ sinh nhà xưởng</p>
                            <a href="gioi-thieu/ve-sinh-cong-nghiep-nam-sao.html"
                                class="d-inline-flex justify-content-between align-items-center btn btn-primary">Xem Thêm
                                <span class="d-inline-flex justify-content-center align-items-center box-icon">
                                    <i class="d-flex lp-arrow-right"></i>
                                </span></a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="h-100 d-flex flex-column justify-content-center box-contact">
                            <div class="box-item">
                                <p class="text-title text-black">Liên hệ</p>
                                <p class="text ml-0"><b>Phone</b>: <a href="tel:0936750009">0936750009</a></p>
                                <p class="text ml-0 mb-0"><b>Email</b>: <a
                                        href="mailto:vesinhnamsao@gmail.com">vesinhnamsao@gmail.com</a></p>
                            </div>
                            <div class="box-line"></div>
                            <div class="box-item">
                                <p class="text-title text-black">Địa chỉ</p>
                                <p class="text ml-0 mb-0">33/110C Tô Ký, <br> phường Tân Chánh Hiệp, Quận 12, TPHCM
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="List_service section_p">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center title_main">
                            <h2>DỊCH VỤ VỆ SINH CÔNG NGHIỆP NỔI BẬT CỦA <span class="text-black">NĂM SAO</span></h2>
                            <p>Công ty Dịch Vụ Vệ Sinh Năm Sao có đa dạng các dịch vụ vệ sinh chất lượng, uy tín,
                                chuyên nghiệp, giá
                                tốt tại tphcm và các tỉnh thành khác như Hà Nội, Đà Nẵng và Cần Thơ</p>
                        </div>
                    </div>
                </div>

                <!-- Start Events -->
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
                                        <p class="mt-3" > {{ Str::words($service->desc, 20, '...') }}</p>
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
                <!-- End Events -->

            </div>
        </section>
        <section class="section-my-team">
            <div class="container">
                <div class="text-center box-text">
                    <h2 class="text-black">ĐỘI VỆ SINH CÔNG NGHIỆP </h2>
                    <div class="reaction justify-content-center" itemscope itemtype="https://schema.org/CreativeWorkSeries">


                        <div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                            <meta itemprop="ratingValue" content="4.1">
                            <meta itemprop="bestRating" content="5">
                            <meta itemprop="ratingCount" content="106">
                        </div>
                    </div>
                    <p>Một trong những yếu tố làm nên uy tín và chất lượng dịch vụ Năm Sao chính là đội ngũ nhân
                        viên chuyên
                        nghiệp. Hiện tại, chúng tôi có 10 đội nhóm, có kinh nghiệm thực thi dự án trên nhiều khu vực
                        khác nhau,
                        đảm bảo làm hài lòng những khách hàng khó tính nhất. Tất cả nhân viên trong đội vệ sinh công
                        nghiệp được
                        đào tạo bài bản, chuyên sâu và luôn làm việc với phương châm</p>
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
                    <h2>QUY TRÌNH VỆ SINH CÔNG NGHIỆP TẠI <span class="text-black">NĂM SAO</span></h2>
                    <p class="mb-0 mx-auto process-intro">Quy trình vệ sinh công nghiệp 5 bước tại Năm Sao tỉ mỉ
                        từng bước cụ
                        thể, đảm bảo mang đến cho công trình một diện mạo mới, sạch sẽ và an toàn.</p>
                </div>
                <div class="d-flex flex-wrap justify-content-center list-item-process">
                    <div class="bg-white text-center item-process" id="step1">
                        <div class="bg-white d-flex justify-content-center align-items-center item-number">
                            <span class="d-flex justify-content-center align-items-center">1</span>
                        </div>
                        <h3>Tiếp nhận thông tin yêu cầu</h3>
                        <p class="text-justify mb-0  item-intro">Tiếp nhận yêu cầu từ khách hàng, Năm Sao sẽ liên
                            hệ và cử nhân
                            viên đến khảo sát thực tế và đưa ra báo giá chi tiết dịch vụ.</p>
                    </div>
                    <div class="bg-white text-center item-process" id="step2">
                        <div class="bg-white d-flex justify-content-center align-items-center item-number"><span
                                class="d-flex justify-content-center align-items-center">2</span></div>
                        <h3>Ký kết hợp đồng làm việc</h3>
                        <p class="text-justify mb-0  item-intro">Khi hai bên đã thống nhất về chi phí, tiến trình
                            làm việc, nội
                            dung hợp đồng vệ sinh công nghiệp, … sẽ tiến tới ký kết hợp đồng.</p>
                    </div>
                    <div class="bg-white text-center item-process" id="step3">
                        <div class="bg-white d-flex justify-content-center align-items-center item-number"><span
                                class="d-flex justify-content-center align-items-center">3</span></div>
                        <h3>Thực hiện vệ sinh công nghiệp</h3>
                        <p class="text-justify mb-0  item-intro">Đội ngủ nhân viên vệ sinh sẽ đến làm việc, cam kết
                            tuân thủ về
                            thời gian, địa điểm, … và các quy định tại nơi làm việc của quý khách.</p>
                    </div>
                    <div class="bg-white text-center item-process" id="step4">
                        <div class="bg-white d-flex justify-content-center align-items-center item-number"><span
                                class="d-flex justify-content-center align-items-center">4</span></div>
                        <h3>Nghiệm thu sau khi vệ sinh</h3>
                        <p class="text-justify mb-0  item-intro">Sau khi hoàn thiện dịch vụ vệ sinh, dọn dẹp sạch
                            sẽ. Năm Sao
                            thông báo quý khách hàng đến nghiệm thu, và kiểm tra lại lần nữa.</p>
                    </div>
                    <div class="bg-white text-center item-process" id="step5">
                        <div class="bg-white d-flex justify-content-center align-items-center item-number"><span
                                class="d-flex justify-content-center align-items-center">5</span></div>
                        <h3>Tiến hành bàn giao dự án</h3>
                        <p class="text-justify mb-0  item-intro">Khách hàng hài lòng và không có yêu cầu gì thêm
                            thì chúng tôi sẽ
                            bàn giao, nhận thanh toán, xuất hóa đơn đầy đủ và kết thúc hợp đồng.</p>
                    </div>
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
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="h-100 d-flex flex-column justify-content-between list-news_items blogs_m">
                            <div class="list_news_item_img blogs_i"><a
                                    href="tin-tuc/cong-trinh-lau-kinh-toa-nha-trung-tam-hanh-chinh-binh-duong.html"><img
                                        class="lazy"
                                        data-src="https://vesinhcongnghiep.com/uploads/files/2021/01/31/thumbs/lau-kinh-TTHC-Binh-Duong-2-370x200-2.jpg"
                                        src="themes/vscn-2020/assets/owlcarousel/assets/ajax-loader.gif"
                                        alt="Công trình: Lau kính tòa nhà Trung tâm Hành chính Bình Dương"
                                        data-pagespeed-url-hash="2013785254"
                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                            </div><a class="mb-auto"
                                href="tin-tuc/cong-trinh-lau-kinh-toa-nha-trung-tam-hanh-chinh-binh-duong.html">
                                <h3 class="title">Công trình: Lau kính tòa nhà Trung tâm Hành chính Bình Dương
                                </h3>
                            </a>
                            <p class="webkit-box-3 box-intro-news"> Vệ Sinh Công Nghiệp Năm triển khai dịch vụ lau
                                kính bên ngoài
                                tòa nhà Trung tâm Hành chính Bình Dương, đảm bảo uy tín, chất lượng, an toàn và giá
                                tốt</p>
                            <div class=""><a class="btn__link blog_news_link"
                                    href="tin-tuc/cong-trinh-lau-kinh-toa-nha-trung-tam-hanh-chinh-binh-duong.html"><span>Chi
                                        Tiết</span><i class="flaticon-right-arrow icon-arrow-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="h-100 d-flex flex-column justify-content-between list-news_items blogs_m">
                            <div class="list_news_item_img blogs_i"><a
                                    href="tin-tuc/tap-the-ve-sinh-cong-nghiep-nam-sao-huong-ve-mien-trung.html"><img
                                        class="lazy"
                                        data-src="https://vesinhcongnghiep.com/uploads/files/2021/01/17/thumbs/nam-sao-huong-ve-mien-trung-370x200-2.jpg"
                                        src="themes/vscn-2020/assets/owlcarousel/assets/ajax-loader.gif"
                                        alt="Tập thể Vệ Sinh Công Nghiệp Năm Sao hướng về Miền Trung"
                                        data-pagespeed-url-hash="2013785254"
                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                            </div><a class="mb-auto"
                                href="tin-tuc/tap-the-ve-sinh-cong-nghiep-nam-sao-huong-ve-mien-trung.html">
                                <h3 class="title">Tập thể Vệ Sinh Công Nghiệp Năm Sao hướng về Miền Trung</h3>
                            </a>
                            <p class="webkit-box-3 box-intro-news">Ngày 22/10/2020, tập thể cán bộ công nhân viên
                                công ty TNHH Vệ
                                Sinh Công Nghiệp Năm Sao thực hiện chuyến thăm tặng những phần quà tận tay đến bà
                                con</p>
                            <div class=""><a class="btn__link blog_news_link"
                                    href="tin-tuc/tap-the-ve-sinh-cong-nghiep-nam-sao-huong-ve-mien-trung.html"><span>Chi
                                        Tiết</span></a></div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section class="section-faqs">
            <div class="container">
                <div class="text-center">
                    <h2>CÂU HỎI THƯỜNG GẶP VỀ DỊCH VỤ VỆ SINH CÔNG NGHIỆP TPHCM</h2>
                    <p>Với các câu hỏi về đơn giá vệ sinh công nghiệp, quý bạn đọc có thể tham khảo bên phần bảng
                        báo giá của
                        chúng tôi trên thanh Menu của website theo từng loại hình cụ thể hoặc nhắn tin cho chúng tôi
                        để được khảo
                        sát và báo giá chi tiết nhé!</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bg-white box-item-faqs">
                            <input class="d-none toggle" type="checkbox" id="question1">
                            <label for="question1" class="form-label-question">
                                <h3 class="mb-0 annwer">Vệ sinh công nghiệp là gì? Thông tin cần biết khi thuê dịch
                                    vụ vệ sinh</h3>
                            </label>
                            <div class="box-question-body">
                                <p class="mb-0">Vệ sinh công nghiệp là một loại hình dịch vụ được cung cấp bởi
                                    các công ty vệ sinh có
                                    đội ngũ nhân viên và máy móc hiện đại. Dịch vụ vệ sinh công nghiệp thường thường
                                    phù hợp với các cơ
                                    sở kinh doanh, doanh nghiệp, tòa nhà văn phòng, … cần vệ sinh khu vực lớn, phức
                                    tạp, có chuyên môn
                                    hoặc đòi hỏi nhiều trang thiết bị bảo hộ lao động như lau kính nhà cao tầng.</p>
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
                <h2 class="text-center">HÌNH ẢNH CÔNG TRÌNH VỆ SINH CÔNG NGHIỆP TPHCM</h2>
                <div class="slick-contruction">
                    <div class="item-img">
                        <a href="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-5-500x350-2.jpg"
                            data-fancybox="gallery" id="single_image1"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-5-500x350-2.jpg"
                                alt="" /></a>
                    </div>
                    <div class="item-img">
                        <a href="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-10-500x350-2.jpg"
                            data-fancybox="gallery" id="single_image2">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-10-500x350-2.jpg"
                                alt="" />
                        </a>
                    </div>
                    <div class="item-img">
                        <a href="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-11-500x350-2.jpg"
                            data-fancybox="gallery" id="single_image3">
                            <img data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-11-500x350-2.jpg"
                                alt="" />
                        </a>
                    </div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-6.jpg"
                            data-fancybox="gallery" id="single_image4"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-6-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-2.jpg"
                            data-fancybox="gallery" id="single_image5"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-2-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-20.jpg"
                            data-fancybox="gallery" id="single_image6"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-20-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-8.jpg"
                            data-fancybox="gallery" id="single_image7"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-8-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-19.jpg"
                            data-fancybox="gallery" id="single_image8"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-19-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-1.jpg"
                            data-fancybox="gallery" id="single_image9"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-1-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-7.jpg"
                            data-fancybox="gallery" id="single_image10"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-7-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-9.jpg"
                            data-fancybox="gallery" id="single_image11"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-9-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-3.jpg"
                            data-fancybox="gallery" id="single_image12"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-3-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-17.jpg"
                            data-fancybox="gallery" id="single_image13"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-17-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-18.jpg"
                            data-fancybox="gallery" id="single_image14"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-18-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-4.jpg"
                            data-fancybox="gallery" id="single_image15"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-4-500x350-2.jpg"
                                alt="" /></a></div>
                    <div class="item-img"><a href="uploads/files/2022/04/18/banner-project-vncn-16.jpg"
                            data-fancybox="gallery" id="single_image16"><img
                                data-lazy="https://vesinhcongnghiep.com/uploads/files/2022/04/18/thumbs/banner-project-vncn-16-500x350-2.jpg"
                                alt="" /></a></div>
                </div>
            </div>


            <!-- End Gallery -->
        </section>
        {{-- google-map --}}
        <x-client.google-map />
        {{-- end-gg-map --}}

    </main>
@endsection